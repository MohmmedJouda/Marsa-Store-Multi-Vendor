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
        'quantity',
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

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariants::class);
    }
}
