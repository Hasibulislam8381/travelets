<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'tran_id', 'amount',
        'quantity', 'travelers', 'promo_code', 'discount', 'status', 'val_id',
    ];

    protected $casts = [
        'travelers' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
