<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                "name" => "admin",
                "email" => "admin@example.com",
                "password" => bcrypt("12345678")
            ]
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
