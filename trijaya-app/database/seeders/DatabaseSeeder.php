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
        $this->call([ServicesSeeder::class]);

        $this->call([StatusSeeder::class]);

        $this->call([AddonsSeeder::class]);

        $this->call([UserSeeder::class]);

        $this->call([BookingSeeder::class]);

        $this->call([BookingAddonsSeeder::class]);

        $this->call([FeedbackSeeder::class]);
    }
}
