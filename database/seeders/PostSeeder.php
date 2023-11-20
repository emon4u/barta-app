<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('posts')->insert([
                'id' => $i,
                'uuid' => $faker->uuid(),
                'user_id' => rand(1, 3),
                'post_content' => $faker->realText(),
                'comment_count' => rand(4, 8),
                'created_at' => now(),
            ]);
        }
    }
}
