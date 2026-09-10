<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceComparison extends Model
{
    protected $fillable = [
        'trip_id', 'category', 'name', 'description', 'price', 'link', 'notes',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
