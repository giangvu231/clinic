<?php

use Illuminate\Database\Seeder;

class suppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplies')->insert([
        	'gia_thanh' => '555',
            'ten_thuoc' => 'Thuốc abc',
        ]);
    }
}
