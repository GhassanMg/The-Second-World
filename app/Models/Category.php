<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function sub_categories()
    {
        return $this->hasMany(Sub_Category::class);
    }

}
