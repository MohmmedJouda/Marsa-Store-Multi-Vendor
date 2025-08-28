<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $store = auth()->user()->store;

        $categories = Category::whereHas('subcategories.products', function ($query) use ($store) {
            $query->whereHas('subcategory', function ($q) {
            })->whereBelongsTo($store);
        })
            ->with(['subcategories' => function ($query) use ($store) {
                $query->whereHas('products', function ($q) use ($store) {
                    $q->whereBelongsTo($store);
                });
            }])
            ->get();

        $subcategories = Subcategory::whereHas('products', function ($query) use ($store) {
            $query->whereBelongsTo($store);
        })->get();

        return view('users.vendor.category.categories', compact('categories', 'subcategories'));
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
    public function show(string $id) {}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
