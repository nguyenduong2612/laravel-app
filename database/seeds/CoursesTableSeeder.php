<?php

use App\Course;
use Faker\Generator as Faker; 
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Course::create([
            'title' => 'Mobile App design step by step from beginner',
            'description' => $faker->text($maxNbChars = 100),
            'image' => '1.png',
            'video' => '1.png',
            'cost' => rand(20, 100),
            'subject_id' => rand(1,7),
            'teacher_id' => 1
        ]);
        Course::create([
            'title' => 'UI/UX design with Adobe XD with Anderson',
            'description' => $faker->text($maxNbChars = 100),
            'image' => '2.png',
            'video' => '2.png',
            'cost' => rand(20, 100),
            'subject_id' => rand(1,7),
            'teacher_id' => 1
        ]);
        Course::create([
            'title' => 'Wordpress theme development from scratch',
            'description' => $faker->text($maxNbChars = 100),
            'image' => '3.png',
            'video' => '3.png',
            'cost' => rand(20, 100),
            'subject_id' => rand(1,7),
            'teacher_id' => 1
        ]);
        Course::create([
            'title' => 'Mobile App design step by step from beginner',
            'description' => $faker->text($maxNbChars = 100),
            'image' => '4.png',
            'video' => '4.png',
            'cost' => rand(20, 100),
            'subject_id' => rand(1,7),
            'teacher_id' => 1
        ]);
        Course::create([
            'title' => 'How to complete user research and make work flow',
            'description' => $faker->text($maxNbChars = 100),
            'image' => '5.png',
            'video' => '5.png',
            'cost' => rand(20, 100),
            'subject_id' => rand(1,7),
            'teacher_id' => 1
        ]);
        Course::create([
            'title' => 'Commitment to dedicated Supported',
            'description' => $faker->text($maxNbChars = 100),
            'image' => '6.png',
            'video' => '6.png',
            'cost' => rand(20, 100),
            'subject_id' => rand(1,7),
            'teacher_id' => 1
        ]);

        
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            Course::create([
                'title' => $faker->jobTitle,
                'description' => $faker->text($maxNbChars = 100),
                'image' => $faker->image('public/storage/',400,300, 'abstract', false),
                'video' => $faker->image('public/storage/',400,300, 'abstract', false),
                'cost' => rand(20, 100),
                'subject_id' => rand(1,7),
                'teacher_id' => 1
            ]);
        }
    }
}
