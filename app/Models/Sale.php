<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'status',
        'price',
        'payment',
        'sale_date',
        
    ];

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
