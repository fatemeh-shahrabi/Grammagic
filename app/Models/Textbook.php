<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Textbook extends Model
{
    use HasFactory;

    protected $fillable = ['grammar_level_id', 'content'];

    public function grammarLevel()
    {
        return $this->belongsTo(GrammarLevel::class);
    }

    public function getContentAsHtml()
    {
        $parsedown = new Parsedown();
        return $parsedown->text($this->content);
    }
}
