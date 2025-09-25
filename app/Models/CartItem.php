<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'product_variant_id',
        'name',
        'qty',
        'price',
        'options',
        'created_at'
    ];

    // السلة المالكة
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    //  المنتج
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //  المتغير (لون/حجم)
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
