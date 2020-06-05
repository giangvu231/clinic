<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'hoten' => 'Quản lý',
            'userid' => 'chandoan',
            'dien_thoai' => '0123456789',
            'di_dong' => '123456',
            "chung_thu_so" => '0123456789',
            "password" => bcrypt("123456"),
			'status' => 1,
			'level_id'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'hoten' => 'Mai',
            'userid' => 'bacsimai',
            'dien_thoai' => '0123456789',
            'di_dong' => '123456',
            "chung_thu_so" => '0123456789',
            "password" => bcrypt("123456"),
			'status' => 1,
			'level_id'=> 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
    }
}
