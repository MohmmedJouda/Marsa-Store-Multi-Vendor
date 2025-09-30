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

        $clean_input = strip_tags($request->input('comment'));  // إزالة أكواد HTML و JS
        $clean_input = htmlspecialchars($clean_input, ENT_QUOTES, 'UTF-8');
        
        $product->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $clean_input,
        ]);


        return back()->with('success', 'تم إضافة التعليق بنجاح');
    }
}
