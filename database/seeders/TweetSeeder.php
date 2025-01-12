<?php

namespace Database\Seeders;

use App\Models\Tweet;
use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach(range(1, 5) as $index){
            $title = $faker->word;
            
            Tweet::create([
                'user_id' => 1,
                'body'    => $faker->paragraph(2),
           ]);
        }
    }
}
