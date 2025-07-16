<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('textbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grammar_level_id')->constrained()->onDelete('cascade');
            $table->text('content'); // Lesson content
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('textbooks');
    }
};
