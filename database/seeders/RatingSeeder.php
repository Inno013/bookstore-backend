<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Creating 500,000 ratings...');
        $this->command->getOutput()->progressStart(500);

        for ($batch = 0; $batch < 500; $batch++) {
            $ratings = [];

            for ($i = 0; $i < 1000; $i++) {
                $ratings[] = [
                    'book_id' => rand(1, 100000),
                    'rating' => rand(1, 10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            Rating::insert($ratings);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info('500,000 Ratings created');
    }
}
