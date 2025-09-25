<?php

namespace App\Http\Controllers;

use App\Models\StoreRating;
use Illuminate\Http\Request;

class StoreRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function rateStore(Request $request, $storeId)
    {
        $request->validate([
            'rate' => 'required|integer|min:1|max:5',
        ]);

        StoreRating::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'store_id' => $storeId
            ],
            [
                'rate' => $request->rate
            ]
        );

        return back()->with('success', 'تم تقييم المتجر بنجاح');
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
    public function show(StoreRating $storeRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreRating $storeRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StoreRating $storeRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreRating $storeRating)
    {
        //
    }
}
