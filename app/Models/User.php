<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'username',
        'password',
        'role_id',
        'user_status_id',
        'security_questions',
        'answer',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'answer',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Hash password automatically when set
    public function setPasswordAttribute($value)
    {
        if ($value !== null && $value !== '') {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    // Hash answer automatically when set
    public function setAnswerAttribute($value)
    {
        if ($value !== null && $value !== '') {
            $this->attributes['answer'] = bcrypt($value);
        }
    }

    // Add this relationship to fix the error
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Optionally, if you have user_status_id relation
    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }
}
