<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('station')->delete();

        $now = Carbon::now()->setTimezone('Asia/Manila');

        $stations = [
            'San Nicholas',
            'Del Pilar',
            'Dolores',
            'Intersection',
            'San Agustin',
            'San Isidro',
            'Maimpis',
            'Del Rosario',
            'Sindalan',
            'Dela Paz Norte',
            'Saguin',
            'Telabastagan',
            'St. Jude',
        ];

        foreach($stations as $station):
            \DB::table('station')->insert([
                'name' => $station,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        endforeach;
    }
}
