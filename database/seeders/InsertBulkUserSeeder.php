<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class InsertBulkUserSeeder extends Seeder
{
    
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'mobile' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'address' => $faker->address,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
            ]);
        }
    }
}
