<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'sur_name',
        'is_type',
        'password',
        'clientid',
        'street_name',
        'house_number',
        'town',
        'postcode',
        'phone',
        'vat_number',
        'r_name',
        'r_position',
        'r_phone',
        'r_photo',
        'r_address',
        'bank_statement',
        'photo',
        'account_sortcode',
        'account_number',
        'account_name',
        'balance',
        'status',
        'about',
        'facebook',
        'twitter',
        'google',
        'linkedin',
        'updated_by',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function campaign()
    {
        return $this->hasMany(Campaign::class);
    }

    public function campaignshare()
    {
        return $this->hasMany(CampaignShare::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    
}
