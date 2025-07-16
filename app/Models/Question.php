<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['level_id', 'content', 'evaluation_prompt'];

    // Relationship with grammar_level (inverse one-to-many)
    
    public function grammarLevel()
    {
        return $this->belongsTo(GrammarLevel::class);
    }

    // Relationship with user_answers (one-to-many)
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
