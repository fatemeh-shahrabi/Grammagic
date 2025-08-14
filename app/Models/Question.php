<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = ['level_id', 'content', 'evaluation_prompt'];

    // Inverse one-to-many relationship with GrammarLevel
    public function grammarLevel()
    {
        return $this->belongsTo(GrammarLevel::class);
    }

    // One-to-many relationship with user answers
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
