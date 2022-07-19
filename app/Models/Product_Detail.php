<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    use HasFactory;

    public function order_items(){
        return $this->hasMany(Order_items::class);
    }

    public function colors(){
        return $this->belongsTo(Color::class);
    }
}
