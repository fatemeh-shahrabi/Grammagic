<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Textbook extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = ['grammar_level_id', 'content'];

    // Inverse relationship to GrammarLevel
    public function grammarLevel()
    {
        return $this->belongsTo(GrammarLevel::class);
    }

    // Convert Markdown content to HTML
    public function getContentAsHtml()
    {
        $parsedown = new Parsedown();
        return $parsedown->text($this->content);
    }
}
