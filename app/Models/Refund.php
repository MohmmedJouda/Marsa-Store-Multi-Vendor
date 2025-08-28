<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_return_id',
        'amount',
        'payment_method',
    ];

    // علاقة مع جدول `ProductReturn`
    public function productReturn()
    {
        return $this->belongsTo(ProductReturn::class);
    }
}
