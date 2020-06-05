<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			LevelsTableSeeder::class,
            // StatusesTableSeeder::class,
            StatusTableSeeder::class,
            UsersTableSeeder::class,
			UserStatusesTableSeeder::class,
            TemplateSeeder::class,
            // MedicalbillSeeder::class,
    	]);
    }
}
