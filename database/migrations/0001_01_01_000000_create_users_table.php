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
        // Creating the 'users' table with necessary fields
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('name');  // User's name
            $table->string('email')->unique();  // User's email (unique for login)
            $table->timestamp('email_verified_at')->nullable();  // Optional email verification timestamp
            $table->string('password');  // User's hashed password
            $table->integer('current_day')->default(1);  // Track user's current day (1-21)
            $table->float('progress', 5, 2)->default(0);  // Overall progress percentage
            $table->rememberToken();  // For "remember me" functionality
            $table->timestamps();  // Timestamps for created_at and updated_at
        });

        // Creating the 'password_reset_tokens' table (for password reset functionality)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();  // Email of user requesting password reset
            $table->string('token');  // Reset token
            $table->timestamp('created_at')->nullable();  // When the reset token was created
        });

        // Creating the 'sessions' table (for tracking user sessions)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();  // Unique session ID
            $table->foreignId('user_id')->nullable()->index();  // Foreign key to the 'users' table
            $table->string('ip_address', 45)->nullable();  // IP address of the user (IPv4/IPv6)
            $table->text('user_agent')->nullable();  // User agent (browser and device info)
            $table->longText('payload');  // Session payload data
            $table->integer('last_activity')->index();  // Timestamp of the last activity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the tables if rolling back migrations
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
