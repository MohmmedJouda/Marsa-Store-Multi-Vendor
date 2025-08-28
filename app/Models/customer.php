<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Addresses;

class customer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phone', 'notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function devices()
    {
        return $this->hasMany(CustomerDevice::class);
    }

    public function supportTickets()
    {
        return $this->hasMany(CustomerSupportTicket::class);
    }

    public function Carts()
    {
        return $this->hasMany(Cart::class);
    }
}
