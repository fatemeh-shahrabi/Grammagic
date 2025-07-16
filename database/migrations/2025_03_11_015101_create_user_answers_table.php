<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('user_id')->constrained('users');  // Foreign key to the users table
            $table->foreignId('question_id')->constrained('questions');  // Foreign key to the questions table
            $table->text('user_answer');  // User's answer text
            $table->float('score');  // GPT-assigned score (0-100)
            $table->text('feedback');  // GPT-generated feedback or suggestions
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
