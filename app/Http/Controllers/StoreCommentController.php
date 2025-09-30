<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreComment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class StoreCommentController extends Controller
{
    public function store(Request $request, Store $store)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $clean_input = strip_tags($request->input('comment'));  // إزالة أكواد HTML و JS
        $clean_input = htmlspecialchars($clean_input, ENT_QUOTES, 'UTF-8');

        $store->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $clean_input,
        ]);


        $comments = StoreComment::with(['user', 'rating'])
        ->where('store_id', $store->id)
        ->latest()
        ->get();


        return back()->with('success', 'تم إضافة التعليق بنجاح');
    }
}

