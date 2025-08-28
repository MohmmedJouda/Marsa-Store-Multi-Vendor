<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',  // إذا كانت هناك أعمدة أخرى قابلة للتعيين
        'image_path',
        'is_main',
    ];

    public function product()
{
    return $this->belongsTo(Product::class);
}

}
