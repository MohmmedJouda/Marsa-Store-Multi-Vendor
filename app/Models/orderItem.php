<?php

namespace App\Models;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_variant_id',
        'quantity',
        'unit_price',
    ];

    // 🔗 الطلب
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // 🔗 المنتج
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // 🔗 المتغير (لون/حجم)
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
