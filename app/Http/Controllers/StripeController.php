<?php

namespace App\Http\Controllers;

use App\Models\Stripe;
use Illuminate\Http\Request;
// use Stripe\Climate\Order;
use App\Models\Order;
class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Order $order)
{
    // جلب كل عناصر الطلب
    $items = $order->items()->with('variant','variant.product')->get();

    // المجموع الفرعي
    $subtotal = $items->sum(fn($item) => $item->total_price);

    // الضرائب وإجمالي الطلب
    $taxAmount = $order->tax_amount;
    $total = $order->total_amount;

    $productDiscount = $item['product_discount'] ?? 0;
    $discount = 0;

    return view('users.customer.payment', compact(
  'order',
 'items',
            'subtotal',
            'taxAmount',
            'total',
            'productDiscount',
            'discount'
            ));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stripe $stripe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stripe $stripe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stripe $stripe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stripe $stripe)
    {
        //
    }
}
