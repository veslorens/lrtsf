<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule')->delete();

        $now = Carbon::now()->setTimezone('Asia/Manila');

        $stations = DB::table('station')->select('id')->get();

        $faker = Faker\Factory::create();



        foreach ($stations as $station) {
            for ( $i = 0; $i <= rand(1,5); $i++ ) {
                DB::table('schedule')->insert([
                    'stationId' => $station->id,
                    'departure' => $faker->dateTime,
                    'arrival' => $faker->dateTime,
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }
        }
    }
}
