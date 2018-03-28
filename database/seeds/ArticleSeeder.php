<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 1; $i < 20; $i++) {
            \App\Article::create([
                'user_id' => $faker->numberBetween(1, 20),
                'title' => $faker->sentence(),
                'slug' => $faker->slug('title'),
                'body' => $faker->text(),
                'description' => $faker->sentence(),
                'images' => $faker->sentence(),
                'tags' => $faker->sentence(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
