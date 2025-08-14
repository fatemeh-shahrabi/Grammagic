<?php

namespace App\Livewire\Grammagic;

// Import required classes
use App\Livewire\Actions\Logout;  
use App\Models\GrammarLevel;      
use App\Models\UserAnswer;        
use Livewire\Component;           

class Dashboard extends Component
{
    // Properties available in the component
    public $user;                 // Currently authenticated user
    public $levels;               // All grammar levels
    public $completedLevels = 0;  // Number of levels completed by the user
    public $daysStreak = 0;       // User's current streak (not yet calculated)
    public $daysLeft = 21;        // Total days in the program (fixed 21-day curriculum)
    public $unlockedLevels = [];  // Array of unlocked level IDs

    // Mount function runs when component is initialized
    public function mount()
    {
        // Get the authenticated user
        $this->user = auth()->user();

        // Get all grammar levels ordered by 'order' column
        $this->levels = GrammarLevel::orderBy('order')->get();

        // Count completed levels by checking distinct level_ids in UserAnswer
        $this->completedLevels = UserAnswer::where('user_id', $this->user->id)
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->distinct('questions.level_id')
            ->count('questions.level_id');

        // Calculate which levels are unlocked
        $this->unlockedLevels = $this->getUnlockedLevels();
    }

    // Function to get unlocked levels for the user
    public function getUnlockedLevels()
    {
        $unlockedLevels = [];
        
        // Level 1 is always unlocked
        $unlockedLevels[] = 1;

        // Loop through all levels starting from 2
        for ($i = 2; $i <= $this->levels->count(); $i++) {
            // Check if the previous level has been completed
            $previousLevelCompleted = UserAnswer::where('user_id', $this->user->id)
                ->whereHas('question', function ($query) use ($i) {
                    // Check if question belongs to previous level
                    $query->where('level_id', $i - 1);
                })
                ->exists();

            // If previous level completed, unlock current level
            if ($previousLevelCompleted) {
                $unlockedLevels[] = $i;
            }
        }

        // Return array of unlocked levels
        return $unlockedLevels;
    }

    // Function to start a level
    public function startLevel($levelId)
    {
        // Check if the level is unlocked
        if (!in_array($levelId, $this->unlockedLevels)) {
            // Show error message if level is locked
            session()->flash('error', 'You must complete the previous level to unlock this one.');
            return;
        }

        // Redirect to the selected level page
        return redirect()->route('level', ['levelId' => $levelId]);
    }

    // Render function for Livewire component
    public function render()
    {
        // Return the view associated with this component
        return view('livewire.grammagic.dashboard');
    }
}
