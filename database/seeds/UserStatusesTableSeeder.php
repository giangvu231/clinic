<?php

use Illuminate\Database\Seeder;

class UserStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_statuses')->insert([
            'status_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('user_statuses')->insert([
            'status_id' => 2,
            'user_id' => 2,
        ]);

    }
}
