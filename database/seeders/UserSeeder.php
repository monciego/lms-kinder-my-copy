<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        {
            $user = new User;
            $user = $user->create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ]);
           
            $user->attachRole('admin');
            
            $user = new User;
            $user = $user->create([
                'name' => 'teacher',
                'email' => 'teacher@gmail.com',
                'password' => Hash::make('password'),
            ]);
           
            $user->attachRole('teacher');
            
            $user = new User;
            $user = $user->create([
                'name' => 'student',
                'email' => 'student@gmail.com',
                'password' => Hash::make('password'),
            ]);
           
            $user->attachRole('student');
        }
    }
}
