<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate(); 
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test2@example.com',
            ]);
        }

        $this->call([
            GrammarLevelSeeder::class, 
            TextbookSeeder::class, 
            QuestionSeeder::class, 
        ]);
    }
}