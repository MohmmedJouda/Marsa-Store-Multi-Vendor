<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $fillable = ['order_id', 'status', 'message','admin_response'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
