<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'name' => 'Darshan Kini', 
            'mobile' => '8369830329',
            'email' => 'darshankini1994@gmail.com',
            'address' => 'Virar',
            'date_of_birth' => '1994-10-17',
            'password' => Hash::make('12345678')
        ]);
    }
}