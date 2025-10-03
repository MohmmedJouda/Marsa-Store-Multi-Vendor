<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
     protected $fillable = [
            'payment_method',     
            'bank_reference',    
            'transaction_id',     
            'receipt_path',     
            'payment_confirmed_at',
        ];
}
