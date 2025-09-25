<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = ['product_id', 'user_id', 'comment'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function rating()
    {
        // البحث عن تقييم هذا المستخدم لنفس المنتج
        return $this->hasOne(ProductRating::class, 'user_id', 'user_id')
                    ->whereColumn('product_id', 'product_id');
    }
}
