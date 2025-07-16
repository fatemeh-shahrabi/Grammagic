<?php

namespace Database\Seeders;

use App\Models\GrammarLevel;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questionsForLevels = [
            1 => [
                [
                    'content' => "Identify the subject, verb, and object in: 'The children play soccer after school.'",
                    'evaluation_prompt' => "Check if the student correctly identified: Subject (The children), Verb (play), Object (soccer)."
                ],
                [
                    'content' => "Create 3 original sentences following the Subject-Verb-Object pattern about your daily routine.",
                    'evaluation_prompt' => "Check if each sentence has a clear subject, verb, and object in correct order."
                ]
            ],
            2 => [
                [
                    'content' => "Replace the nouns with pronouns: 'Sarah and I went to the market. Sarah and I bought fruits.'",
                    'evaluation_prompt' => "Check if replaced with: 'We went to the market. We bought fruits.'"
                ],
                [
                    'content' => "Write about your best friend using at least 3 different pronouns (he/she/they/we/etc.).",
                    'evaluation_prompt' => "Check for correct pronoun usage matching the nouns they replace."
                ]
            ],
            3 => [
                [
                    'content' => "Imagine you're a journalist reporting yesterday's events. Write 3 sentences using past tense verbs.",
                    'evaluation_prompt' => "Check for proper use of past tense verbs describing completed actions."
                ],
                [
                    'content' => "Correct this sentence: 'She go to school every day.'",
                    'evaluation_prompt' => "Check if changed to: 'She goes to school every day.' (present simple 3rd person)."
                ]
            ],
            4 => [
                [
                    'content' => "Describe your dream vacation using at least 2 adjectives and 2 adverbs.",
                    'evaluation_prompt' => "Check for proper use of adjectives (describe nouns) and adverbs (modify verbs)."
                ],
                [
                    'content' => "Transform this sentence into a more vivid one: 'The man walked.'",
                    'evaluation_prompt' => "Check for added adjectives/adverbs that enhance description (e.g., 'The elderly man walked slowly')."
                ]
            ],
            5 => [
                [
                    'content' => "Write directions from your home to the nearest park using 3 different prepositions.",
                    'evaluation_prompt' => "Check for correct preposition usage (e.g., 'Turn left at the corner', 'across from')."
                ],
                [
                    'content' => "Combine these sentences using a conjunction: 'I wanted to go out. It was raining.'",
                    'evaluation_prompt' => "Check for proper conjunction usage (e.g., 'but', 'so')."
                ]
            ],
            6 => [
                [
                    'content' => "Choose the correct article: 'I saw ___ elephant at the zoo.' (a, an, the)",
                    'evaluation_prompt' => "Check if 'an' is used for the singular, non-specific noun 'elephant'."
                ],
                [
                    'content' => "Write a sentence using 'the' to describe a specific object in your room.",
                    'evaluation_prompt' => "Check if 'the' is used correctly for a specific noun."
                ]
            ],
            7 => [
                [
                    'content' => "Write a short paragraph (4-5 sentences) about your morning routine using Week 1 topics (sentence structure, nouns, pronouns, adjectives, adverbs, prepositions, conjunctions, articles).",
                    'evaluation_prompt' => "Check for correct use of at least 4 Week 1 grammar concepts in a cohesive paragraph."
                ],
                [
                    'content' => "Correct this sentence: 'A dog run fast and jump high.'",
                    'evaluation_prompt' => "Check if corrected to: 'A dog runs fast and jumps high.' (subject-verb agreement, parallel structure)."
                ]
            ],
            8 => [
                [
                    'content' => "Write 3 sentences about your daily habits using the present simple tense.",
                    'evaluation_prompt' => "Check for correct use of present simple for habits or facts."
                ],
                [
                    'content' => "Transform this sentence to past simple: 'I read a book every night.'",
                    'evaluation_prompt' => "Check if changed to: 'I read a book last night.' or similar past simple form."
                ]
            ],
            9 => [
                [
                    'content' => "Plan your weekend using 'will' and 'going to' in 3 sentences.",
                    'evaluation_prompt' => "Check for correct use of 'will' (decisions) and 'going to' (plans)."
                ],
                [
                    'content' => "Write about an experience using the present perfect: 'I have just...'.",
                    'evaluation_prompt' => "Check for correct use of present perfect for recent or relevant actions."
                ]
            ],
            10 => [
                [
                    'content' => "Write advice for a new student using 'should' and 'must' in 2 sentences.",
                    'evaluation_prompt' => "Check for correct use of 'should' (advice) and 'must' (necessity)."
                ],
                [
                    'content' => "Express your ability to do something using 'can' in a sentence.",
                    'evaluation_prompt' => "Check if 'can' is used correctly for ability."
                ]
            ],
            11 => [
                [
                    'content' => "Correct this sentence: 'The team play bad yesterday.'",
                    'evaluation_prompt' => "Check if corrected to: 'The team played badly yesterday.' (subject-verb agreement, adverb)."
                ],
                [
                    'content' => "Write a sentence with a plural subject and verb in agreement.",
                    'evaluation_prompt' => "Check for correct subject-verb agreement with a plural subject."
                ]
            ],
            12 => [
                [
                    'content' => "Write a first conditional sentence about a goal you have this year.",
                    'evaluation_prompt' => "Check for correct structure: 'If + present simple, will + base verb.'"
                ],
                [
                    'content' => "Write a zero conditional sentence about a daily fact.",
                    'evaluation_prompt' => "Check for correct structure: 'If + present simple, present simple.'"
                ]
            ],
            13 => [
                [
                    'content' => "Convert to indirect speech: 'She said, 'I will visit my friend tomorrow.''",
                    'evaluation_prompt' => "Check if converted to: 'She said she would visit her friend tomorrow.'"
                ],
                [
                    'content' => "Report a question someone asked you today in indirect speech.",
                    'evaluation_prompt' => "Check for correct tense and pronoun changes in reported form."
                ]
            ],
            14 => [
                [
                    'content' => "Write a paragraph (4-5 sentences) combining Week 2 topics: tenses, modals, subject-verb agreement, conditionals, reported speech.",
                    'evaluation_prompt' => "Check for correct use of at least 3 Week 2 grammar concepts."
                ],
                [
                    'content' => "Correct this sentence: 'If I will study, I pass the exam.'",
                    'evaluation_prompt' => "Check if corrected to: 'If I study, I will pass the exam.' (first conditional)."
                ]
            ],
            15 => [
                [
                    'content' => "Convert to passive voice: 'The chef cooks delicious meals.'",
                    'evaluation_prompt' => "Check if converted to: 'Delicious meals are cooked by the chef.'"
                ],
                [
                    'content' => "Write a passive voice sentence about a recent event in your city.",
                    'evaluation_prompt' => "Check for correct passive voice structure."
                ]
            ],
            16 => [
                [
                    'content' => "Describe a person you know using a relative clause with 'who'.",
                    'evaluation_prompt' => "Check for correct use of 'who' in a relative clause describing a person."
                ],
                [
                    'content' => "Write a sentence about an object using 'which' or 'that' in a relative clause.",
                    'evaluation_prompt' => "Check for correct use of 'which' or 'that' in a relative clause."
                ]
            ],
            17 => [
                [
                    'content' => "Report this conversation: 'He said, 'I’m studying English.' She replied, 'That’s great!''",
                    'evaluation_prompt' => "Check if reported as: 'He said he was studying English. She replied that it was great.'"
                ],
                [
                    'content' => "Write a reported speech sentence about advice someone gave you.",
                    'evaluation_prompt' => "Check for correct tense and pronoun shifts in reported speech."
                ]
            ],
            18 => [
                [
                    'content' => "Write 3 questions (yes/no, wh-, tag) to ask a classmate about their hobbies.",
                    'evaluation_prompt' => "Check for correct formation of each question type."
                ],
                [
                    'content' => "Correct this question: 'Where you live?'",
                    'evaluation_prompt' => "Check if corrected to: 'Where do you live?'"
                ]
            ],
            19 => [
                [
                    'content' => "Identify and fix 3 errors in: 'She don’t like to went market and buy a fruits.'",
                    'evaluation_prompt' => "Check for corrections: 'She doesn’t like to go to the market and buy fruits.' (subject-verb agreement, verb tense, article)."
                ],
                [
                    'content' => "Write a sentence correcting a common mistake you’ve made in English.",
                    'evaluation_prompt' => "Check if the sentence is grammatically correct and addresses a common error."
                ]
            ],
            20 => [
                [
                    'content' => "Write a complex sentence about your plans using a subordinate clause.",
                    'evaluation_prompt' => "Check for correct use of a subordinate clause (e.g., 'because', 'although')."
                ],
                [
                    'content' => "Combine these ideas into a complex sentence: 'I was tired. I finished my homework. It was late.'",
                    'evaluation_prompt' => "Check for correct use of conjunctions and clauses."
                ]
            ],
            21 => [
                [
                    'content' => "Write a short story (5-7 sentences) using:\n- Past simple tense\n- At least one relative clause\n- One conditional sentence\n- Two adjectives",
                    'evaluation_prompt' => "Check for:\n1. Correct past tense usage\n2. Proper relative clause structure\n3. Valid conditional form\n4. Appropriate adjectives."
                ],
                [
                    'content' => "Review this sentence and identify 3 grammar concepts used: 'Although I had studied hard, I was nervous before the test, which was very important for my future.'",
                    'evaluation_prompt' => "Check for identification of:\n1. Conjunction (Although)\n2. Past perfect (had studied)\n3. Relative clause (which...)."
                ]
            ]
        ];

        foreach ($questionsForLevels as $day => $questions) {
            $level = GrammarLevel::where('day_number', $day)->first();

            if ($level) {
                foreach ($questions as $question) {
                    Question::create([
                        'level_id' => $level->id,
                        'content' => $question['content'],
                        'evaluation_prompt' => $question['evaluation_prompt'],
                    ]);
                }
            }
        }
    }
}
