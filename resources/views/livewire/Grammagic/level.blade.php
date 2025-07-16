@php
use League\CommonMark\GithubFlavoredMarkdownConverter;
$converter = new GithubFlavoredMarkdownConverter();
@endphp

<div class="min-h-screen bg-gray-50 font-poppins">
    <!-- Header -->
    <div class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center text-indigo-600 hover:text-indigo-800 hover-scale">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                <span class="ml-2 font-medium">Back to Dashboard</span>
            </a>
            <div class="flex items-center">
                <div class="mr-4 text-sm text-gray-500 font-medium">
                    Level {{ $levelId }} of 21
                </div>
                <div class="w-32 bg-gray-200 rounded-full h-2.5">
                    <div class="bg-indigo-600 h-2.5 rounded-full gradient-bg" style="width: {{ ($levelId / 21) * 100 }}%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
        @if ($isTextbookVisible)
            <!-- Textbook Section -->
            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-sm card-hover animate__animated animate__fadeIn">
                <div class="prose max-w-none text-gray-700">
                    {!! $converter->convert($textbook->content) !!}
                </div>
                <button wire:click="showQuestion"
                        class="mt-6 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white gradient-bg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover-scale">
                    Start Quiz
                </button>
            </div>
        @else
            <!-- Question Section -->
            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-sm card-hover animate__animated animate__fadeIn">
                <h2 class="text-xl font-bold gradient-text mb-4">Question {{ $step + 1 }} of {{ $questions->count() }}</h2>
                <p class="text-gray-700 mb-4">{{ $currentQuestion->content }}</p>
                <div class="mb-4">
                    <label for="answer" class="block text-sm font-medium text-gray-700">Your Answer</label>
                    <textarea wire:model="currentAnswer" id="answer"
                              class="kb-input text-left mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus-ring focus:border-indigo-500 sm:text-sm"
                              placeholder="Type your answer here..." rows="4"></textarea>
                </div>
                <button wire:click="checkAnswer"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white gradient-bg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover-scale">
                    Submit Answer
                </button>
                @if ($gptFeedback)
                    <div class="mt-4 p-4 bg-gray-100 rounded-md">
                        <p class="text-sm text-gray-700">{!! nl2br(e($gptFeedback)) !!}</p>
                    </div>
                @endif
                @if ($gptFeedback && strtolower(trim($gptFeedback)) === 'correct')
                    <button wire:click="{{ $isLastQuestion ? 'finishQuiz' : 'nextStep' }}"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white gradient-bg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover-scale">
                        {{ $isLastQuestion ? 'Finish Quiz' : 'Next Question' }}
                    </button>
                @endif
            </div>
        @endif
    </div>

    <style>
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #10B981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #10B981 100%);
        }
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .focus-ring {
            transition: all 0.3s ease;
        }
        .focus-ring:focus {
            ring: 2px solid #4F46E5;
            outline: none;
        }
    </style>
</div>