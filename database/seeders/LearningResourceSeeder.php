<?php

namespace Database\Seeders;

use App\Models\LearningResource;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LearningResourceSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            LearningResource::create([
                'title' => $faker->sentence(4),
                'description' => $faker->paragraph(),
                'academic_program' => $faker->randomElement([
                    'BS Information Technology',
                    'BS Computer Science',
                    'BS Information Systems',
                    'BS Business Administration',
                ]),
                'subject' => $faker->randomElement([
                    'Web Development',
                    'Database Management',
                    'Networking',
                    'Cybersecurity',
                    'Programming',
                ]),
                'topic' => $faker->sentence(3),
                'year_level' => $faker->randomElement([
                    '1st Year',
                    '2nd Year',
                    '3rd Year',
                    '4th Year',
                ]),
                'uploaded_by' => $faker->name(),
            ]);
        }
    }
}
