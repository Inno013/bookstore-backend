<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $this->command->info('Creating 100,000 books...');
        $this->command->getOutput()->progressStart(100);

        for ($batch = 0; $batch < 100; $batch++) {
            $books = [];

            for ($i = 0; $i < 1000; $i++) {
                $books[] = [
                    'title' => $faker->sentence(rand(2, 6)),
                    'author_id' => rand(1, 1000),
                    'category_id' => rand(1, 3000),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            Book::insert($books);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info('100,000 Books created');
    }
}
