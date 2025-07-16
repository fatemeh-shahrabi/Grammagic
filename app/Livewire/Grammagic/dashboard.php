<?php

namespace App\Livewire\Grammagic;

use App\Livewire\Actions\Logout;
use App\Models\GrammarLevel;
use App\Models\UserAnswer;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Dashboard extends Component
{
    public $user;
    public $levels;
    public $completedLevels = 0;
    public $daysStreak = 0;
    public $daysLeft = 21;
    public $unlockedLevels = [];

    public function mount()
    {
        $this->user = auth()->user();
        $this->levels = GrammarLevel::orderBy('order')->get();
        $this->completedLevels = UserAnswer::where('user_id', $this->user->id)
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->distinct('questions.level_id')
            ->count('questions.level_id');
        $this->unlockedLevels = $this->getUnlockedLevels();
    }

    public function getUnlockedLevels()
    {
        $unlockedLevels = [];
        $unlockedLevels[] = 1; // Level 1 is always unlocked

        for ($i = 2; $i <= $this->levels->count(); $i++) {
            $previousLevelCompleted = UserAnswer::where('user_id', $this->user->id)
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

    public function startLevel($levelId)
    {
        if (!in_array($levelId, $this->unlockedLevels)) {
            session()->flash('error', 'You must complete the previous level to unlock this one.');
            return;
        }

        return redirect()->route('level', ['levelId' => $levelId]);
    }

    public function render()
    {
        return view('livewire.grammagic.dashboard');
    }
}