<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'status',
        'shipping_plan',
        'shipping_amount',
        'tax_amount',
        'total_amount',
        'currency',
        'order_number'
    ];

    //  العميل
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //  المتجر
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    //  العناصر التابعة للطلب
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    //  معلومات الدفع
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    protected static function booted()
{
    static::creating(function ($order) {
        $lastOrder = Order::where('user_id', $order->user_id)->max('order_number');
        $order->order_number = $lastOrder ? $lastOrder + 1 : 1;
    });
}

}
