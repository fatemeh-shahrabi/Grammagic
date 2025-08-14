<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Fillable fields for mass assignment
    protected $fillable = [
        'name', 'email', 'password', 'current_day', 'progress', 'last_completed_at'
    ];

    // One-to-many relationship with UserAnswer
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    // Many-to-many relationship with GrammarLevels
    public function grammarLevels()
    {
        return $this->belongsToMany(GrammarLevel::class);
    }
}
