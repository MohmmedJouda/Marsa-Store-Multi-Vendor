<?php

// app/Listeners/MergeCartOnLogin.php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\{Cart, CartItem, Product};
use Illuminate\Support\Facades\DB;

class MergeCartOnLogin
{
    public function handle(Login $event): void
    {
        $sessionItems = session('cart.items', []); // نفس المفتاح القديم
        if (empty($sessionItems)) return;

        DB::transaction(function () use ($event, $sessionItems) {
            $cart = Cart::firstOrCreate(
                ['user_id' => $event->user->id, 'status' => 'open'],
                ['status' => 'open']
            );

            foreach ($sessionItems as $productId => $it) {
                $product = Product::find($productId);
                if (! $product) continue;

                $row = CartItem::firstOrNew([
                    'cart_id'    => $cart->id,
                    'product_id' => $productId,
                ]);

                $row->price = $product->price;
                $row->qty   = ($row->exists ? $row->qty : 0) + (int)($it['qty'] ?? 1);
                $row->save();
            }
        });

        session()->forget('cart.items'); // فضي الـ Session بعد الدمج
    }
}
