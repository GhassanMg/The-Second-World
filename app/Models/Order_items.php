<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;

    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product_detail(){
        return $this->belongsTo(Product_Detail::class);
    }
}
