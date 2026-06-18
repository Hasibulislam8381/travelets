<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    protected $fillable = ['meta'];

    protected $casts = [
        'meta' => 'array',
    ];
}
