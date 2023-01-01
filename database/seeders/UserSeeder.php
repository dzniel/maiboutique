<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(

            [
                [
                    'username' => 'Admin',
                    'email' => 'admin@mail.com',
                    'password' => Hash::make('admin'),
                    'phone_number' => '082127638980',
                    'address' => 'The Ritz-Carlton Abu Dhabi, Grand Canal',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'username' => 'Daniel',
                    'email' => 'daniel@icloud.com',
                    'password' => Hash::make('daniel'),
                    'phone_number' => '082167971234',
                    'address' => 'Mandarin Oriental Barcelona',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'username' => 'Oleksandr Kostyliev',
                    'email' => 's1mple@gmail.com',
                    'password' => Hash::make('s1mple'),
                    'phone_number' => '082238492637',
                    'address' => 'Hyatt Regency Kyiv',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]
            ]
        );
    }
}
