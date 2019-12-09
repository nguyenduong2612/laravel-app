<?php

use App\User;
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
        $user = User::where('email', 'admin@gmail.com')->first();
        if (!$user) {
            User::create([
                'role' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'teacher',
                'name' => 'Teacher',
                'email' => 'teacher@gmail.com',
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Student 2',
                'email' => 'student2@gmail.com',
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Student 3',
                'email' => 'student3@gmail.com',
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Student 4',
                'email' => 'student4@gmail.com',
                'password' => Hash::make('123456')
            ]);
        }
    }
}
