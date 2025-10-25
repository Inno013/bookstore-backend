<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [];
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 3000; $i++) {
            $categories[] = [
                'name' => $faker->words(rand(1, 3), true),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (array_chunk($categories, 1000) as $chunk) {
            Category::insert($chunk);
        }

        $this->command->info('3,000 Categories created');
    }
}
