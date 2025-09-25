<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_id',
        'total_price',
        'shipping_address',
        'status',
        'payment_method',
        'payment_status',
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

}
