<?php

namespace App\Livewire\Grammagic;

use App\Models\GrammarLevel;
use App\Models\Question;
use Livewire\Component;
use App\Service\MetisClient;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserAnswer;
use Carbon\Carbon;

class Level extends Component
{
    public $isTextbookVisible = true;
    public $currentQuestion;
    public $currentAnswer = '';
    public $step = 0;
    public $textbook;
    public $levelId;
    public $questions = [];
    public $gptFeedback = '';
    public $isLastQuestion = false;

    public function mount($levelId)
    {
        $this->levelId = $levelId;

        $unlockedLevels = $this->getUnlockedLevels();

        if (!in_array($levelId, $unlockedLevels)) {
            session()->flash('error', 'You must complete the previous level to unlock this one.');
            return redirect()->route('dashboard');
        }

        $level = GrammarLevel::findOrFail($levelId);
        $this->textbook = $level->textbook;
        $this->questions = Question::where('level_id', $levelId)->limit(2)->get();
        $this->currentQuestion = $this->questions->first();
        $this->updateIsLastQuestion();
    }

    protected function getUnlockedLevels()
    {
        $user = auth()->user();
        $unlockedLevels = [1]; // Level 1 is always unlocked

        for ($i = 2; $i <= GrammarLevel::count(); $i++) {
            $previousLevelCompleted = UserAnswer::where('user_id', $user->id)
                ->whereHas('question', function ($query) use ($i) {
                    $query->where('level_id', $i - 1);
                })
                ->exists();

            if ($previousLevelCompleted) {
                $unlockedLevels[] = $i;
            }
        }

        return $unlockedLevels;
    }

    public function showQuestion()
    {
        $this->isTextbookVisible = false;

        if ($this->step < $this->questions->count()) {
            $this->currentQuestion = $this->questions[$this->step];
            $this->currentAnswer = '';
            $this->gptFeedback = '';
        }
    }

    public function checkAnswer()
    {
        if (!isset($this->questions[$this->step])) {
            return;
        }
    
        try {
            $response = MetisClient::getClient()->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => "You are a helpful English tutor evaluating grammar answers from a student. 

Your job is to:
- Check if the user's sentence correctly applies the grammar rule.
- If it's correct, reply: Correct (with out any information or details just the word 'correct')
- If it's wrong, briefly explain what’s wrong and give an example of a correct sentence.

Keep your answer simple and friendly, suitable for English learners.

Question: {$this->questions[$this->step]->content}
Grammar Focus: {$this->questions[$this->step]->evaluation_prompt}
"

                    ],
                    ['role' => 'user', 'content' => $this->currentAnswer],
                ],
            ]);
    
            $this->gptFeedback = $response->choices[0]->message->content ?? 'Sorry, something went wrong.';
        } catch (\Exception $e) {
            $this->gptFeedback = 'Error: Unable to process your request. Please try again.';
        }
    }

    public function nextStep()
    {
        if (strtolower(trim($this->gptFeedback)) !== 'correct') {
            return;
        }

        if ($this->step < $this->questions->count() - 1) {
            $this->step++;
            $this->updateIsLastQuestion();
            $this->showQuestion();
        }
    }

    public function finishQuiz()
    {
        if (strtolower(trim($this->gptFeedback)) !== 'correct' || !$this->isLastQuestion) {
            return;
        }

        // Save the user's answer
        UserAnswer::create([
            'user_id' => auth()->id(),
            'question_id' => $this->currentQuestion->id,
            'user_answer' => $this->currentAnswer,
            'score' => 100,
            'feedback' => $this->gptFeedback,
        ]);

        // Update streak
        $user = auth()->user();
        $today = Carbon::today();
        $lastActivity = $user->last_activity_date ? Carbon::parse($user->last_activity_date) : null;

        if ($lastActivity && $lastActivity->isYesterday()) {
            // Consecutive day: increment streak
            $user->current_streak += 1;
        } elseif (!$lastActivity || !$lastActivity->isToday()) {
            // New day or streak reset: start at 1
            $user->current_streak = 1;
        }
        $user->last_activity_date = $today;
        $user->save();

        return Redirect::to('/dashboard');
    }

    protected function updateIsLastQuestion()
    {
        $this->isLastQuestion = $this->step === $this->questions->count() - 1;
    }

    public function render()
    {
        return view('livewire.grammagic.level', [
            'textbook' => $this->textbook,
            'currentQuestion' => $this->currentQuestion,
            'step' => $this->step,
            'isTextbookVisible' => $this->isTextbookVisible,
            'gptFeedback' => $this->gptFeedback,
            'isLastQuestion' => $this->isLastQuestion,
        ]);
    }
}