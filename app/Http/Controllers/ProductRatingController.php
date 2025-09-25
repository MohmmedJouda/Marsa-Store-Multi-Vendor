<?php

namespace App\Http\Controllers;

use App\Models\productRating;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function rateProduct(Request $request, $productId)
    {
        $request->validate([
            'rate' => 'required|integer|min:1|max:5',
        ]);

        productRating::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $productId
            ],
            [
                'rate' => $request->rate
            ]
        );

    return back()->with('success', 'تم تقييم المنتج بنجاح');
}
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(productRating $productRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productRating $productRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, productRating $productRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productRating $productRating)
    {
        //
    }
}
