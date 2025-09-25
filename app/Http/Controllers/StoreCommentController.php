<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreComment;
use Illuminate\Http\Request;

class StoreCommentController extends Controller
{
    public function store(Request $request, Store $store)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $store->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        $comments = StoreComment::with(['user', 'rating'])
        ->where('store_id', $store->id)
        ->latest()
        ->get();


        return back()->with('success', 'تم إضافة التعليق بنجاح');
    }
}

