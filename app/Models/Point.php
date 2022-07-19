<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang',
        'lat',
        'facility_id',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
