<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->call('StationTableSeeder');
        $this->call('ScheduleTableSeeder');
        $this->call('NewsTableSeeder');
	}

}
