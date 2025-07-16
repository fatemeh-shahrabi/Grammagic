<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'current_day', 'progress', 'last_completed_at'
    ];
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function grammarLevels()
    {
        return $this->belongsToMany(GrammarLevel::class);
    }
}
