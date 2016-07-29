<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->delete();

        $now = Carbon::now()->setTimezone('Asia/Manila');

        $faker = Faker\Factory::create();

        $limit = 20;

        for ( $i = 0; $i < $limit; $i++ ) {
            DB::table('news')->insert([
                'title' => $faker->text($maxNbChars = 100),
                'content' => $faker->text($maxNbChars = 200),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
