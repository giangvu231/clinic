<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'name' => 'Admin'
        ]);
        DB::table('levels')->insert([
            'name' => 'Lễ tân'
        ]);
        DB::table('levels')->insert([
            'name' => 'Điều dưỡng'
        ]);
        DB::table('levels')->insert([
            'name' => 'Bác sĩ'
        ]);
        DB::table('levels')->insert([
            'name' => 'Thư ký'
        ]);
        DB::table('levels')->insert([
            'name' => 'Trưởng khoa'
        ]);
    }
}
