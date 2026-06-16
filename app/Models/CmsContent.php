<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsContent extends Model
{
    protected $fillable = [
        'page',
        'section',
        'title',
        'subtitle',
        'description',
        'image',
        'status',
    ];
}
