<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productRating extends Model
{
     protected $fillable = [
        'user_id',
        'product_id',
        'rate',
    ];

    // العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع المنتج
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
