<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Facility extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => false,
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
    protected $fillable = [
        'name',
        'status',
        'buy_price',
        'rent_price',
        'description',
        'type',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
    public function business_profile()
    {
        return $this->belongsTo(business_profile::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function points()
    {
        return $this->hasMany(Point::class);
    }
}
