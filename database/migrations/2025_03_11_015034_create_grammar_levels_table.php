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
        Schema::create('grammar_levels', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->integer('day_number')->unique();  // Day number (1-21) should be unique
            $table->string('topic');  // Grammar topic (e.g., "Present Simple")
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grammar_levels');
    }
};
