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
        
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            Course::create([
                'title' => $faker->jobTitle,
                'description' => $faker->text($maxNbChars = 100),
                'image' => $faker->image('public/storage/',400,300, 'abstract', false),
                'video' => $faker->image('public/storage/',400,300, 'abstract', false),
                'subject_id' => rand(1,7),
                'teacher_id' => 1
            ]);
        }
    }
}
