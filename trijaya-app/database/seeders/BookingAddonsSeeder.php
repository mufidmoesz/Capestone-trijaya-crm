<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingAddonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $bookingAddons = [
            [
                'booking_id' => 1,
                'addon_id' => 1
            ],
            [
                'booking_id' => 1,
                'addon_id' => 2
            ],
            [
                'booking_id' => 2,
                'addon_id' => 3
            ],
            [
                'booking_id' => 3,
                'addon_id' => 4
            ],
            [
                'booking_id' => 4,
                'addon_id' => 5
            ],
            [
                'booking_id' => 5,
                'addon_id' => 1
            ],
            [
                'booking_id' => 5,
                'addon_id' => 3
            ],
        ];

        foreach ($bookingAddons as $bookingAddon)
        {
            DB::table('booking_addons')->insert($bookingAddon);
        }
    }
}
