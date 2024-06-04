<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCar extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'brands' => 'array',
    ];
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
