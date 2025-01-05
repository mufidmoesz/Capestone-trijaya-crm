<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AddonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $addons = [
            [
                'name' => 'Air Filter',
                'description' => 'High-quality air filter for improved engine performance',
                'price' => 15.99,
                'stock' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Brake Pads',
                'description' => 'Durable brake pads for enhanced braking efficiency',
                'price' => 45.99,
                'stock' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Spark Plugs',
                'description' => 'Set of 4 spark plugs for better ignition',
                'price' => 25.99,
                'stock' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Fuel Pump',
                'description' => 'Reliable fuel pump for consistent fuel delivery',
                'price' => 89.99,
                'stock' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Alternator',
                'description' => 'High-performance alternator for efficient power generation',
                'price' => 120.99,
                'stock' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        foreach ($addons as $addon) {
            DB::table('add_ons')->insert($addon);
        }
    }
}
