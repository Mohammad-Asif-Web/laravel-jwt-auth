<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'phone' => '0123456789',
                'role' => 'admin',
                'country' => 'usa',
                'country_code' => '111',
                'city' => 'South dacota',
                'state' => 'las vegas',
                'street' => '123 ranking street',
                'postal_code' => '3251'
            ],
            [
                'name' => 'asif',
                'email' => 'asif@admin.com',
                'password' => Hash::make('12345678'),
                'phone' => '0123456788',
                'role' => 'user',
                'country' => 'bangladesh',
                'country_code' => '123',
                'city' => 'dhaka',
                'state' => 'dhaka',
                'street' => 'r m das road',
                'postal_code' => '1200'
            ],
            [
                'name' => 'sajid',
                'email' => 'sajid@admin.com',
                'password' => Hash::make('12345678'),
                'phone' => '0123456787',
                'role' => 'user',
                'country' => 'bangladesh',
                'country_code' => '123',
                'city' => 'munshigonj',
                'state' => 'dhaka',
                'street' => 'sonir akra',
                'postal_code' => '1354'
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }



    }
}
