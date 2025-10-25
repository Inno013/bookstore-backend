<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $authors = [];
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 1000; $i++) {
            $authors[] = [
                'name' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert in chunks untuk efisiensi
        foreach (array_chunk($authors, 500) as $chunk) {
            Author::insert($chunk);
        }

        $this->command->info('1,000 Authors created');
    }
}
