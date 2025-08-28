<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VendorDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VendorAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.vendor-register');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'store_name' => 'required|string|max:255',
            'document_file' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'vendor',
            ]);

            // create store
            $store = Store::create([
                'user_id' => $user->id,
                'name' => $request->store_name,
                'slug' => Str::slug($request->store_name),
            ]);

            // save document
            $path = $request->file('document_file')->store('vendor_documents', 'public');
            VendorDocument::create([
                'user_id' => $user->id,
                'document_type' => 'commercial_register',
                'document_url' => $path,
            ]);

            DB::commit();

            // login auto
            Auth::login($user);

            return redirect()->route('vendor.dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error creating vendor account.');
        }
    }
}
