<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use App\Models\Order;
use Illuminate\Http\Request;

class FeedBackController extends Controller
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
    public function create($order_id, $status)
    {
        $order = Order::findOrFail($order_id);
        return view('users.customer.feedback', compact('order', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'order_id' => 'required|exists:orders,id',
        'status' => 'required|in:cancelled,refunded,delivered',
        'feedback' => 'required|string|max:1000',
    ]);

    Feedback::create([
        'order_id' => $request->order_id,
        'status' => $request->status,
        'message' => $request->feedback,
    ]);

    return redirect()->back()->with('success', 'تم الارسال بنجاح!');
}


    /**
     * Display the specified resource.
     */
    public function show(FeedBack $feedBack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeedBack $feedBack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeedBack $feedBack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeedBack $feedBack)
    {
        //
    }
}
