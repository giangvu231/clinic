<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabs')->insert([
            'name' => 'Order',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('tabs')->insert([
            'name' => 'Schedule',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('tabs')->insert([
            'name' => 'Worklist',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('tabs')->insert([
            'name' => 'Reporting',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
