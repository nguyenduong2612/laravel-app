<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker; 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        if (!$user) {
            User::create([
                'role' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'teacher',
                'name' => 'Teacher Ava chó',
                'email' => 'avacho@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Duong Hai Nguyen',
                'email' => 'nguyenduong@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Nguyen Duc Anh',
                'email' => 'ducanh@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Phan Quoc Toan',
                'email' => 'quoctoan@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);
            User::create([
                'role' => 'student',
                'name' => 'Nguyen Quang Anh',
                'email' => 'quanganh@gmail.com',
                'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                'password' => Hash::make('123456')
            ]);

            for ($i = 1; $i <= 5; $i++) {
                User::create([
                    'role' => 'student',
                    'name' => $faker->name,
                    'email' => 'student'.$i.'@gmail.com',
                    'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                    'password' => Hash::make('123456')
                ]);
                User::create([
                    'role' => 'teacher',
                    'name' => $faker->name,
                    'email' => 'teacher'.$i.'@gmail.com',
                    'avatar' => $faker->image('public/storage/',400,300, 'people', false),
                    'password' => Hash::make('123456')
                ]);
            }
        }
    }
}
