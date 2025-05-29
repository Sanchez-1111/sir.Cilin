<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehiclename',
        'color',
        'price',
        'mileage',
        'contact',
        'location',
        'document',
        'transmission',
        'condition',
        'features',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'mileage' => 'integer',
        'features' => 'array',
    ];
}
