<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id', 'user_answer', 'score', 'feedback'];

    // Relationship with user (inverse one-to-many)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with question (inverse one-to-many)
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
