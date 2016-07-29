<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();

        $now = Carbon::now()->setTimezone('Asia/Manila');

        \DB::table('user')->insert([
            'username' => 'lorenzo' ,
            'password' => Hash::make('lorenzo@yee'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        \DB::table('user')->insert([
            'username' => 'admin' ,
            'password' => Hash::make('admin'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

    }
}
