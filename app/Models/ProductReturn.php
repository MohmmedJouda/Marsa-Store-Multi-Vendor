<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturn extends Model
{
    use HasFactory;

    protected $table = 'product_returns';

    // تحديد الأعمدة القابلة للتحديث (mass assignable)
    protected $fillable = [
        'order_id',
        'product_id',
        'customer_id',
        'reason',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function refund()
    {
        return $this->hasOne(Refund::class);
    }
}
