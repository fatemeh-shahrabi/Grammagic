<?php

namespace Database\Seeders;

use App\Models\Textbook;
use App\Models\GrammarLevel;
use Illuminate\Database\Seeder;

class TextbookSeeder extends Seeder
{
    public function run(): void
    {
        $contentForDays = [
            1 => "# Day 1: Basic Sentence Structure\n\nLearn the foundational building blocks of English sentences:\n- **Subject**: Who or what the sentence is about.\n- **Verb**: The action or state.\n- **Object**: What receives the action (optional).\n\n**Example**: `I eat pizza.` (Subject: I, Verb: eat, Object: pizza)\n\n**Practice**: Write 3 sentences about your daily routine using the Subject-Verb-Object structure.",
            2 => "# Day 2: Nouns & Pronouns\n\nExplore nouns and pronouns:\n- **Nouns**: Name people, places, or things (e.g., `dog`, `London`).\n- **Pronouns**: Replace nouns to avoid repetition (e.g., `he`, `she`, `they`).\n\n**Example**: `She works at a bank.`\n\n**Practice**: Replace nouns with pronouns in: `Sarah loves books. Sarah reads every day.`",
            3 => "# Day 3: Verbs & Verb Forms\n\nDiscover verbs:\n- **Regular Verbs**: Follow standard patterns (e.g., `walk`, `walked`).\n- **Irregular Verbs**: Change forms uniquely (e.g., `go`, `went`).\n\n**Example**: `They visited London last year.`\n\n**Practice**: Write 3 sentences using different irregular verbs in the past tense.",
            4 => "# Day 4: Adjectives & Adverbs\n\nEnhance sentences with:\n- **Adjectives**: Describe nouns (e.g., `a beautiful flower`).\n- **Adverbs**: Modify verbs (e.g., `She runs quickly`).\n\n**Example**: `He speaks softly.`\n\n**Practice**: Describe your favorite place using 2 adjectives and 2 adverbs.",
            5 => "# Day 5: Prepositions & Conjunctions\n\nConnect ideas with:\n- **Prepositions**: Show relationships (e.g., `in`, `on`, `at`).\n- **Conjunctions**: Link clauses (e.g., `and`, `but`).\n\n**Example**: `The book is on the table.`\n\n**Practice**: Combine two ideas about your day using a conjunction.",
            6 => "# Day 6: Articles (A, An, The)\n\nMaster articles:\n- **A/An**: Used for non-specific singular nouns (e.g., `a dog`).\n- **The**: Specifies particular nouns (e.g., `the park`).\n\n**Example**: `I saw a dog in the park.`\n\n**Practice**: Write 3 sentences using `a`, `an`, and `the` correctly.",
            7 => "# Day 7: Review Week 1\n\nReview key concepts from Week 1:\n- Sentence structure\n- Nouns, pronouns, verbs\n- Adjectives, adverbs, prepositions, conjunctions, articles\n\n**Practice**: Create a short paragraph combining all Week 1 topics.",
            8 => "# Day 8: Present & Past Tense\n\nLearn tenses:\n- **Present Simple**: Habits or facts (e.g., `I walk to school.`).\n- **Past Simple**: Completed actions (e.g., `I walked yesterday.`).\n\n**Practice**: Write 3 sentences about your routine in present tense and 3 about yesterday in past tense.",
            9 => "# Day 9: Future & Perfect Tenses\n\nExplore:\n- **Future**: Use `will` or `going to` (e.g., `I will go tomorrow.`).\n- **Present Perfect**: Completed actions with relevance (e.g., `I have finished.`).\n\n**Practice**: Plan your weekend using `will` and describe an experience with `have/has`.",
            10 => "# Day 10: Modal Verbs (Can, Must, Should)\n\nUse modals for:\n- **Ability**: `Can` (e.g., `I can swim.`).\n- **Necessity**: `Must` (e.g., `You must study.`).\n- **Advice**: `Should` (e.g., `You should rest.`).\n\n**Practice**: Write advice for a friend using `should`.",
            11 => "# Day 11: Subject-Verb Agreement\n\nEnsure subjects and verbs agree:\n- Singular: `She runs.`\n- Plural: `They run.`\n\n**Example**: `The team plays well.`\n\n**Practice**: Correct errors in: `The dogs runs fast.`",
            12 => "# Day 12: Conditionals (If Clauses)\n\nLearn conditionals:\n- **Zero**: General facts (e.g., `If it rains, I stay home.`).\n- **First**: Real possibilities (e.g., `If I study, I will pass.`).\n\n**Practice**: Write a first conditional sentence about your goals.",
            13 => "# Day 13: Direct & Indirect Speech\n\nConvert speech:\n- **Direct**: `He said, 'I am tired.'`\n- **Indirect**: `He said he was tired.`\n\n**Practice**: Report what a friend said today using indirect speech.",
            14 => "# Day 14: Review Week 2\n\nReview Week 2 topics:\n- Tenses, modal verbs\n- Subject-verb agreement, conditionals, reported speech\n\n**Practice**: Write a paragraph combining Week 2 concepts.",
            15 => "# Day 15: Passive Voice\n\nShift focus to actions:\n- Active: `She wrote the book.`\n- Passive: `The book was written by her.`\n\n**Practice**: Convert 3 active sentences to passive voice.",
            16 => "# Day 16: Relative Clauses (Who, Which, That)\n\nAdd details with:\n- **Who**: People (e.g., `The man who lives next door.`).\n- **Which/That**: Things (e.g., `The book that I read.`).\n\n**Practice**: Describe an object using a relative clause.",
            17 => "# Day 17: Reported Speech\n\nDeepen reported speech skills:\n- Change tenses and pronouns (e.g., `She said, 'I am here.'` → `She said she was there.`).\n\n**Practice**: Report a conversation you had this week.",
            18 => "# Day 18: Question Formation\n\nForm questions:\n- **Yes/No**: `Do you like coffee?`\n- **Wh-Questions**: `Where are you going?`\n\n**Practice**: Write 3 questions to ask a new friend.",
            19 => "# Day 19: Common Grammar Mistakes\n\nCorrect errors:\n- Wrong: `I have went.`\n- Right: `I have gone.`\n\n**Practice**: Identify and fix 3 mistakes in a given paragraph.",
            20 => "# Day 20: Complex Sentences\n\nUse subordinate clauses:\n- Example: `Although it was raining, we went out.`\n\n**Practice**: Write a complex sentence about your day.",
            21 => "# Day 21: Final Review & Test\n\nReview all topics:\n- Combine tenses, clauses, and modals in a cohesive paragraph.\n\n**Practice**: Write a short story using 3 grammar concepts from the course."
        ];

        foreach ($contentForDays as $day => $content) {
            $level = GrammarLevel::where('day_number', $day)->first();
            
            if ($level) {
                Textbook::create([
                    'grammar_level_id' => $level->id,
                    'content' => $content,
                ]);
            }
        }
    }
}
