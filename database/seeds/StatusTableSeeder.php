<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('statuses')->insert([
        //     'name' => 'ĐẶT LỊCH',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'BỆNH NHÂN ĐẾN KHOA CĐHA',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'BỆNH NHÂN ĐÃ CHUẨN BỊ XONG',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'BẮT ĐẦU CA CHỤP',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'BỎ QUA',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'HỦY CA CHỤP',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'TẠM DỪNG',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'CA CHỤP HOÀN THÀNH',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'BẮT ĐẦU GÕ KẾT QUẢ',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'SỬA KẾT QUẢ',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('statuses')->insert([
        //     'name' => 'KẾT THÚC',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // 
        // DB::table('statuses')->insert([
        //     'name' => 'Order',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        DB::table('statuses')->insert([
            'name' => 'Schedule',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Worklist',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Đang chờ ',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Đã hoàn thành',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
