<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductVariants extends Model
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
        return $this->belongsToMany(ProductAttributeValue::class, 'product_variant_attribute_value')
            ->withPivot('product_attribute_id')
            ->withTimestamps();
    }
}
