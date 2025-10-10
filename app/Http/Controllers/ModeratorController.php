<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\order;
use App\Models\FeedBack;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\FeedbackReplyNotification;

class ModeratorController extends Controller
{
    // Start Vendors
    public function indexByRole($role)
    {
        // $users = User::Where("role", "vendor")->get();
        if (!in_array($role, ['vendor', 'customer'])) {
            abort(404);
        }
        $users = User::where('role', $role)->get();
        $usersDeleted = User::onlyTrashed()->where('role', $role)->get()->count();

        return view("users.moderator.index", compact('users', 'role', 'usersDeleted'));
    }

    public function create()
    {
        return view('users.moderator.create');
    }

    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'store_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                //create user
                $user = new User();
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->password = Hash::make('123456789');
                $user->role = 'vendor';
                $userSaved = $user->save();

                // create store
                $store = new Store();
                $store->user_id = $user->id;
                $store->name = $request->get('store_name');
                $store->slug = Str::slug($request->get('store_name'));
                $store->description = $request->get('description');
                $store->phone = $request->get('phone');
                $store->address = $request->get('address');
                $store->status = $request->status ?? 'pending';
                $storeSaved = $store->save();

                DB::commit();
                if ($userSaved && $storeSaved) {

                    $users = User::where('role', 'vendor')->with('store')->latest()->get();
                    $html = view('users.moderator.table_rows', compact('users'))->render();
                    return response()->json([
                        'message' => 'Seller and store created successfully',
                        'html' => $html
                    ]);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'message' => 'An error occurred while creating the vendor.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function show($id)
    {
        $user = User::with('documents')->findOrFail($id);
        return view('users.moderator.vendor_show', compact('user'));
    }



    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'store_name' => $user->store->name,
            'description' => $user->store->description,
            'phone' => $user->store->phone,
            'address' => $user->store->address,
            'status' => $user->store->status,
        ]);
    }



    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'store_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
        if (!$validator->fails()) {
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->store->name = $request->get('store_name');
            $user->store->description = $request->get('description');
            $user->store->phone = $request->get('phone');
            $user->store->address = $request->get('address');
            $user->store->status = $request->get('status');
            $user->save();
            $saved = $user->store->save();
            if ($saved) {

                $users = User::where('role', 'vendor')->with('store')->get();

                $html = view('users.moderator.table_rows', compact('users'))->render();
                return response()->json([
                    'message' => 'Seller and store updated successfully',
                    'html' => $html
                ]);
            } else {
                return response()->json([
                    'message' => 'Seller and store updated Failed',

                ]);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }




    public function destroy($id)
    {
        $user = User::with('store')->findOrFail($id);


        if ($user->store) {
            $user->store->delete(); // soft delete
            $user->delete();
            return response()->json([
                'title' => 'Deleted successfully',
                'icon' => 'success'
            ]);
        } else {
            return response()->json([
                'title' => 'Deleted Failed',
                'icon' => 'danger'
            ]);
        }
    }





    public function trashed()
    {
        $users = User::onlyTrashed()->with(['store' => function ($q) {
            $q->withTrashed();
        }])->get();
        return view('users.moderator.trashed_vendors', compact('users'));
    }




    public function restore($id)
    {
        $user = User::onlyTrashed()->with(['store' => fn($q) => $q->withTrashed()])->findOrFail($id);

        $user->restore();

        if ($user->store) {
            $user->store->restore();
        }

        return redirect()->back()->with('success', 'Request restored successfully');
    }




    public function forceDelete($id)
    {

        $user = User::onlyTrashed()->with(['store' => fn($q) => $q->withTrashed()])->findOrFail($id);

        if ($user->store) {
            $user->store->forceDelete();
        }

        $deleted = $user->forceDelete();

        if ($deleted) {
            return response()->json([
                'title' => 'تم الحذف بنجاح',
                'icon' => 'success'
            ]);
        } else {
            return response()->json([
                'title' => 'فشل الحذق',
                'icon' => 'danger'
            ]);
        }
    }




    public function ajaxSearch(Request $request)
    {
        $query = $request->get('query');
        $status = $request->get('status');

        $users = User::where('role', 'vendor')
            ->when($query, function ($q) use ($query) {
                $q->where(function ($q2) use ($query) {
                    $q2->where('name', 'like', "%{$query}%")
                        ->orWhereHas('store', function ($q3) use ($query) {
                            $q3->where('name', 'like', "%{$query}%");
                        });
                });
            })
            ->when($status && $status !== 'all', function ($q) use ($status) {
                $q->whereHas('store', function ($q2) use ($status) {
                    $q2->where('status', $status);
                });
            })
            ->with('store')
            ->get();

        $html = view('users.moderator.table_rows', compact('users'))->render();
        return response()->json(['html' => $html]);
    }


    public function orders_in_admin(){
        
    $orders = Order::whereHas('items.product')
    ->with(['items.product', 'payment'])
    ->get();

    return view('users.admin.orders', compact('orders'));    

    }

    public function feedbacks_in_admin(){
        $feedbacks = FeedBack::with('order.user','order.payment')->get();
    return view('users.admin.feedbacks', compact('feedbacks'));    
    }

    public function feedback_show($id){
        $feedback = FeedBack::find($id);
        return view('users.admin.feedback',compact('feedback'));
    }

    public function reply(Request $request, $id)
{
    $request->validate([
        'reply' => 'required|string|max:1000',
    ]);

    $feedback = Feedback::findOrFail($id);
    $feedback->admin_response = $request->reply;
    $feedback->save();

    if ($feedback->order && $feedback->order->user) {
        $feedback->order->user->notify(new FeedbackReplyNotification($feedback));
    }
    return redirect()->back()->with('success', 'تم إرسال الرد بنجاح ✅');
}

     public function feedback_destroy($id)
    {
        $feedback = FeedBack::findOrFail($id);

        if (!$feedback) {
            return redirect()->back()->with('error', 'الرسالة غير موجودة.');
        }

        $feedback->delete();

        return redirect()->back()->with('success', 'تم حذف الرسالة بنجاح.');
    }



}
