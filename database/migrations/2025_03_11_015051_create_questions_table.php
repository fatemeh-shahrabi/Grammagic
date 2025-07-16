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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('level_id')->constrained('grammar_levels');  // Foreign key to the grammar_levels table
            $table->string('content');  // Question content (e.g., "Write a sentence using the present continuous tense")
            $table->text('evaluation_prompt');  // GPT evaluation prompt
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
