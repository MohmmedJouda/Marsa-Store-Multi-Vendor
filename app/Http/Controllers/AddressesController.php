<?php

    namespace App\Http\Controllers;

    use App\Models\Address;
    use Illuminate\Http\Request;
    use App\Models\ProductVariant;
    use App\Models\Order;
    use Illuminate\Support\Facades\Auth;

    class AddressesController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validated = $request->validate([
                'first_name'   => 'required|string|max:255',
                'last_name'    => 'required|string|max:255',
                'email'        => 'required|email|max:255',
                'phone_number' => 'required|string|max:20',
                'state'        => 'required|in:gaza,westbank',
                'city'         => 'required|string|max:255',
                'address'      => 'required|string|max:500',
                'postal_code'  => 'nullable|string|max:20',
            ]);

            $address = Address::create([
                'user_id'     => Auth::id(),
                'first_name'  => $validated['first_name'],
                'last_name'   => $validated['last_name'],
                'email'       => $validated['email'],
                'phone'       => $validated['phone_number'],
                'state'       => $validated['state'],
                'city'        => $validated['city'],
                'address'     => $validated['address'],
                'postal_code' => $validated['postal_code'] ?? null,
            ]);

                $items = [];

                if ($request->filled('variant_id')) {
                $variant = ProductVariant::with('product')->findOrFail($request->variant_id);
                $qty = $request->input('qty', 1);

                $items[] = [
                    'product_id' => $variant->product->id,
                    'variant_id' => $variant->id,
                    'name' => $variant->product->name,
                    'price' => $variant->price,
                    'quantity' => $qty,
                    'product_discount' => $variant->product->discount ?? 0,
                ];
            }

            $subtotal = 0;
            $discount = 0;
            foreach ($items as $item) {
                $subtotal += $item['price'] * $item['quantity'];
                // خصم المنتج
                $productDiscount = $item['product_discount'] ?? 0;
                $discount += ($item['price'] * $item['quantity'] * $productDiscount) / 100;
            }
 
        $shippingPlan = $request->shipping_method ?? 'standard';

        // حساب السعر حسب طريقة الشحن
        if ($shippingPlan === 'express') {
            $shippingAmount = 10;
        } elseif ($shippingPlan === 'standard') {
            $shippingAmount = 5;
        } elseif ($shippingPlan === 'free') {
            $shippingAmount = 0;
        } else {
            $shippingAmount = 5; // fallback
        }

        // لتحديد الخيار المحدد مسبقاً في الواجهة
        $taxAmount = 5;      // مثال ثابت

  
            $totalAmount = $subtotal + $shippingAmount + $taxAmount - $discount;


        $order = Order::create([
            'user_id'        => Auth::id(),
            'address_id'     => $address->id,
            'payment_method' => 'pending',
            'status'         => 'pending',
            'shipping_plan'  => $shippingPlan,   
            'shipping_amount'=> $shippingAmount, 
            'tax_amount'     => $taxAmount,
            'total_amount'   => $totalAmount,
            'currency'       => 'usd',
        ]);

        foreach ($items as $item) {
        $order->items()->create([
            'product_id'        => $item['product_id'],
            'product_variant_id'=> $item['variant_id'],
            'quantity'          => $item['quantity'],
            'unit_price'        => variant->price,
        ]);
    }

            return redirect()->route('customer.payment.index',$order->id)->with('success', 'تم حفظ العنوان بنجاح');
        }

        /** 
         * Display the specified resource.
         */
        public function show(Address $address)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Address $address)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Address $address)
        {
            if ($address->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل هذا العنوان');
        }

            $validated = $request->validate([
                'first_name'   => 'required|string|max:255',
                'last_name'    => 'required|string|max:255',
                'email'        => 'required|email|max:255',
                'phone_number' => 'required|string|max:20',
                'state'        => 'required|in:gaza,westbank',
                'city'         => 'required|string|max:255',
                'address'      => 'required|string|max:500',
                'postal_code'  => 'nullable|string|max:20',
            ]);

            $address->update([
                'first_name'  => $validated['first_name'],
                'last_name'   => $validated['last_name'],
                'email'       => $validated['email'],
                'phone'       => $validated['phone_number'],
                'state'       => $validated['state'],
                'city'        => $validated['city'],
                'address'     => $validated['address'],
                'postal_code' => $validated['postal_code'] ?? null,
            ]);

            return redirect()->back()->with('success', 'تم تحديث العنوان بنجاح');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Address $address)
        {
            //
        }
    }
