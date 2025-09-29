<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'store_id',
        'subcategory_id',
        'name',
        'stock',
        'slug',
        'description',
        'price',
        'status',
        'is_active',
        'is_featured',
        'discount',
    ];
    protected $dates = ['deleted_at'];


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage() {
        return $this->hasOne(ProductImage::class)->where('is_main', 1); 
    }


    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function comments()
    {
        return $this->hasMany(ProductComment::class);
    }


    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }

        // Product.php
public function orderItems()
{
    return $this->hasMany(OrderItem::class); // كل OrderItem مرتبط بمنتج واحد عبر product_id
}



}
