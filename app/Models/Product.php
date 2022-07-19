<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function facility(){
        return $this->belongsTo(Facility::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function product_category(){
        return $this->belongsTo(Product_Category::class);
    }
}
