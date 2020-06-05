<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'Đặt lịch'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Đã đến'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Chụp xong'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Đang đọc'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Đang sửa'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Đã xong'
        ]);
    }
}
