<?php

namespace App\Livewire\Grammagic;

// Import required classes
use App\Models\GrammarLevel;
use App\Models\Question;
use Livewire\Component;
use App\Service\MetisClient;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserAnswer;
use Carbon\Carbon;

class Level extends Component
{
    // Determines if textbook content is currently visible
    public $isTextbookVisible = true;

    // Holds the current question object
    public $currentQuestion;

    // Stores the user's current answer
    public $currentAnswer = '';

    // Current step/index of the quiz
    public $step = 0;

    // Stores textbook content for the level
    public $textbook;

    // ID of the current level
    public $levelId;

    // Array/collection of questions for the current level
    public $questions = [];

    // Feedback returned from GPT evaluation
    public $gptFeedback = '';

    // Boolean to indicate if the current question is the last one
    public $isLastQuestion = false;

    /**
     * Mount the component and initialize level data
     *
     * @param int $levelId
     */
    public function mount($levelId)
    {
        $this->levelId = $levelId;

        // Get the levels unlocked by the user
        $unlockedLevels = $this->getUnlockedLevels();

        // Redirect to dashboard if level is locked
        if (!in_array($levelId, $unlockedLevels)) {
            session()->flash('error', 'You must complete the previous level to unlock this one.');
            return redirect()->route('dashboard');
        }

        // Load level data
        $level = GrammarLevel::findOrFail($levelId);
        $this->textbook = $level->textbook;

        // Load first two questions for the level
        $this->questions = Question::where('level_id', $levelId)->limit(2)->get();

        // Set the first question as the current question
        $this->currentQuestion = $this->questions->first();

        // Update flag for last question
        $this->updateIsLastQuestion();
    }

    /**
     * Determine which levels are unlocked for the authenticated user
     *
     * @return array
     */
    protected function getUnlockedLevels()
    {
        $user = auth()->user();
        $unlockedLevels = [1]; // Level 1 is always unlocked

        // Loop through levels starting from 2
        for ($i = 2; $i <= GrammarLevel::count(); $i++) {
            // Check if previous level is completed by user
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

    /**
     * Show the current question (hide textbook)
     */
    public function showQuestion()
    {
        $this->isTextbookVisible = false;

        // Load question if step is within bounds
        if ($this->step < $this->questions->count()) {
            $this->currentQuestion = $this->questions[$this->step];
            $this->currentAnswer = '';
            $this->gptFeedback = '';
        }
    }

    /**
     * Check the user's answer using GPT evaluation
     */
    public function checkAnswer()
    {
        // Ensure question exists for current step
        if (!isset($this->questions[$this->step])) {
            return;
        }
    
        try {
            // Call GPT API via MetisClient
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
Grammar Focus: {$this->questions[$this->step]->evaluation_prompt}"
                    ],
                    ['role' => 'user', 'content' => $this->currentAnswer],
                ],
            ]);
    
            // Store feedback from GPT
            $this->gptFeedback = $response->choices[0]->message->content ?? 'Sorry, something went wrong.';
        } catch (\Exception $e) {
            // Handle errors gracefully
            $this->gptFeedback = 'Error: Unable to process your request. Please try again.';
        }
    }

    /**
     * Proceed to the next step/question if answer is correct
     */
    public function nextStep()
    {
        // Only proceed if feedback is "correct"
        if (strtolower(trim($this->gptFeedback)) !== 'correct') {
            return;
        }

        // Move to next question if not last
        if ($this->step < $this->questions->count() - 1) {
            $this->step++;
            $this->updateIsLastQuestion();
            $this->showQuestion();
        }
    }

    /**
     * Finish the quiz and save user's answer
     */
    public function finishQuiz()
    {
        // Only finish if last question and answer is correct
        if (strtolower(trim($this->gptFeedback)) !== 'correct' || !$this->isLastQuestion) {
            return;
        }

        // Save the user's answer in database
        UserAnswer::create([
            'user_id' => auth()->id(),
            'question_id' => $this->currentQuestion->id,
            'user_answer' => $this->currentAnswer,
            'score' => 100,
            'feedback' => $this->gptFeedback,
        ]);

        // Update user's streak
        $user = auth()->user();
        $today = Carbon::today();
        $lastActivity = $user->last_activity_date ? Carbon::parse($user->last_activity_date) : null;

        if ($lastActivity && $lastActivity->isYesterday()) {
            // Consecutive day: increment streak
            $user->current_streak += 1;
        } elseif (!$lastActivity || !$lastActivity->isToday()) {
            // New day or reset streak
            $user->current_streak = 1;
        }

        $user->last_activity_date = $today;
        $user->save();

        // Redirect back to dashboard
        return Redirect::to('/dashboard');
    }

    /**
     * Update boolean flag for last question
     */
    protected function updateIsLastQuestion()
    {
        $this->isLastQuestion = $this->step === $this->questions->count() - 1;
    }

    /**
     * Render the Livewire view for the level
     */
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
