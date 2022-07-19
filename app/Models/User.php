<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
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
        'password',
        'phone',
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

    public function avatar()
    {
        return $this->belongsTo(Avatar::class);
    }
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function auctions() {
        return $this->belongsToMany(Auction::class);
    }

    public function prizes() {
        return $this->belongsToMany(Prize::class);
    }

    public function facilities() {
        return $this->belongsToMany(Facility::class);
    }

    public function avatars()
    {
        return $this->hasMany(Avatar::class);
    }
}
