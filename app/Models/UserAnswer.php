<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = ['user_id', 'question_id', 'user_answer', 'score', 'feedback'];

    // Inverse one-to-many relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Inverse one-to-many relationship with Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
