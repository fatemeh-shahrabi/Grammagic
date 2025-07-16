<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammarLevel extends Model
{
    use HasFactory;

    protected $fillable = ['day_number', 'topic', 'order'];

    // Relationship with questions (one-to-many)
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function textbook()
{
    return $this->hasOne(Textbook::class);
}

    // Relationship with users (many-to-many)
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
