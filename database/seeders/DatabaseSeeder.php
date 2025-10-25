<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AuthorSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            RatingSeeder::class,
        ]);

        $this->command->info('=================================');
        $this->command->info('All data seeded successfully!');
        $this->command->info('=================================');
    }
}
