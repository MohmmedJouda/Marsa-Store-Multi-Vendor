<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'combination',
        'price',
        'quantity',
        'sku',
        'image',
    ];

    protected $casts = [
        'combination' => 'array', // auto-casts JSON to array
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(
            ProductAttributeValue::class,           // لازم يكون مع القيم مش مع الخصائص
            'product_variant_attribute_value',      // جدول الربط
            'product_variant_id',                   // المفتاح في جدول الربط
            'product_attribute_value_id'            // المفتاح الثاني (القيمة)
        )->withPivot('product_attribute_id')        // علشان تجيب الـ Attribute نفسه كمان
        ->withTimestamps();
    }


    
}
