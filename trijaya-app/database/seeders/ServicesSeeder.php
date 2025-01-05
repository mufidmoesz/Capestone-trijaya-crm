<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $services = [
            [
                'service_name' => 'Oil Change',
                'service_description' => 'Complete oil change with filter replacement',
                'service_price' => 49.99,
                'estimated_time' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'service_name' => 'Brake Inspection',
                'service_description' => 'Thorough inspection of brake system',
                'service_price' => 29.99,
                'estimated_time' => 45,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'service_name' => 'Tire Rotation',
                'service_description' => 'Rotation of all four tires to ensure even wear',
                'service_price' => 19.99,
                'estimated_time' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'service_name' => 'Battery Replacement',
                'service_description' => 'Replacement of old battery with a new one',
                'service_price' => 89.99,
                'estimated_time' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'service_name' => 'Engine Diagnostic',
                'service_description' => 'Comprehensive engine diagnostic and troubleshooting',
                'service_price' => 99.99,
                'estimated_time' => 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($services as $service) {
            DB::table('services')->insert($service);
        }
    }
}
