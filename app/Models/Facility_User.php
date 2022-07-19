<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility_User extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function facility()
    {
        return $this->hasMany(Facility::class);

    }
}
