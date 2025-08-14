<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammarLevel extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = ['day_number', 'topic', 'order'];

    // One-to-many relationship with questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // One-to-one relationship with textbook
    public function textbook()
    {
        return $this->hasOne(Textbook::class);
    }

    // Many-to-many relationship with users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
