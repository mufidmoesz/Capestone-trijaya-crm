<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $feedbacks = [
            [
                'booking_id' => 1,
                'rating' => 5,
                'comment' => 'Excellent service, very satisfied!'
            ],
            [
                'booking_id' => 2,
                'rating' => 4,
                'comment' => 'Good service, but could be faster.'
            ],
            [
                'booking_id' => 3,
                'rating' => 3,
                'comment' => 'Average experience, nothing special.'
            ],
            [
                'booking_id' => 4,
                'rating' => 2,
                'comment' => 'Not very happy with the service.'
            ],
            [
                'booking_id' => 5,
                'rating' => 1,
                'comment' => 'Very poor service, not recommended.'
            ],
        ];

        foreach ($feedbacks as $feedback) {
            DB::table('feedback')->insert($feedback);
        }
    }
}
