<?php

use App\Lesson;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 15; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                Lesson::create([
                    'title' => $faker->jobTitle,
                    'description' => $faker->text($maxNbChars = 60),
                    'course_id' => $i,
                ]);
            }
        }
    }
}
