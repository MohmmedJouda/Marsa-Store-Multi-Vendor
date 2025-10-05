<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreRating extends Model
{
     protected $fillable = [
        'user_id',
        'store_id',
        'rate',
    ];

    // العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع المتجر

        public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
