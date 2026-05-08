<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'type',
        'badge',
        'location',
        'short_description',
        'description',
        'price',
        'thumbnail',
        'gallery',
        'meta',
        'status',
    ];

    protected $casts = [
        'gallery' => 'array',
        'meta'    => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
