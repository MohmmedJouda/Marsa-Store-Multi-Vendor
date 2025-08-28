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
        'quantity',
        'price',
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
        return $this->belongsTo(ProductVariants::class, 'product_variant_id');
    }
}
