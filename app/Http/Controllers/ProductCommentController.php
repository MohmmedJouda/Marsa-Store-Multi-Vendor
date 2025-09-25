<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductComment;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $product->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'تم إضافة التعليق بنجاح');
    }
}
