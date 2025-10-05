<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
// implements MustVerifyEmail
{
    use HasApiTokens;
    use SoftDeletes;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'role', 'is_active', 'email_verified_at', 'profile_photo_path'];
    protected $dates = ['deleted_at'];

    public function store()
    {
        return $this->hasOne(Store::class, 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(VendorDocument::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //         public function comment()
    // {
    //     return $this->hasMany(comment::class);
    // }


        public function productRatings()
    {
        return $this->hasMany(ProductRating::class);
    }

    public function storeRatings()
    {
        return $this->hasMany(StoreRating::class);
    }

    public function vendorDocuments()
    {
        return $this->hasMany(VendorDocument::class, 'user_id');
    }

    // public function getProfilePhotoUrlAttribute()
    // {
    //     return $this->profile_photo_path
    //         ? asset('storage/' . $this->profile_photo_path)
    //         : asset('images/default-avatar.png');
    // }
}
