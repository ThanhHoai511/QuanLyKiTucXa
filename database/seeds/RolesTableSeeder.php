<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Giám đốc - Phụ trách chung'],
            ['name' => 'Quản lý sinh viên'],
            ['name' => 'Quản lý hồ sơ lưu trữ'],
            ['name' => 'Kế toán'],
            ['name' => 'Thủ quỹ'],
            ['name' => 'Cơ sở vật chất'],
        ]);
    }
}
