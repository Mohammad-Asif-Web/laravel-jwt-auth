<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Call the UserSeeder class

        $this->call(SportSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        // Call the UserSeeder class


    }
}
