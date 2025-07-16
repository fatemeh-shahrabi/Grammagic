<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GrammarLevel;
use Illuminate\Support\Facades\DB;

class GrammarLevelSeeder extends Seeder
{
    public function run()
    {
        DB::statement('PRAGMA foreign_keys = OFF;');

        GrammarLevel::truncate();

        $levels = [
            ['day_number' => 1, 'topic' => 'Basic Sentence Structure'],
            ['day_number' => 2, 'topic' => 'Nouns & Pronouns'],
            ['day_number' => 3, 'topic' => 'Verbs & Verb Forms'],
            ['day_number' => 4, 'topic' => 'Adjectives & Adverbs'],
            ['day_number' => 5, 'topic' => 'Prepositions & Conjunctions'],
            ['day_number' => 6, 'topic' => 'Articles (A, An, The)'],
            ['day_number' => 7, 'topic' => 'Review Week 1'],
            ['day_number' => 8, 'topic' => 'Present & Past Tense'],
            ['day_number' => 9, 'topic' => 'Future & Perfect Tenses'],
            ['day_number' => 10, 'topic' => 'Modal Verbs (Can, Must, Should)'],
            ['day_number' => 11, 'topic' => 'Subject-Verb Agreement'],
            ['day_number' => 12, 'topic' => 'Conditionals (If Clauses)'],
            ['day_number' => 13, 'topic' => 'Direct & Indirect Speech'],
            ['day_number' => 14, 'topic' => 'Review Week 2'],
            ['day_number' => 15, 'topic' => 'Passive Voice'],
            ['day_number' => 16, 'topic' => 'Relative Clauses (Who, Which, That)'],
            ['day_number' => 17, 'topic' => 'Reported Speech'],
            ['day_number' => 18, 'topic' => 'Question Formation'],
            ['day_number' => 19, 'topic' => 'Common Grammar Mistakes'],
            ['day_number' => 20, 'topic' => 'Complex Sentences'],
            ['day_number' => 21, 'topic' => 'Final Review & Test'],
        ];

        foreach ($levels as $level) {
            GrammarLevel::create($level);
        }

        DB::statement('PRAGMA foreign_keys = ON;');
    }
}
