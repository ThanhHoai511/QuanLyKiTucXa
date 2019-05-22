<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NhanVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhanvien')->insert([
            'ho_ten' => 'Super Admin',
            'chuc_vu' => 1,
            'email' => 'superadmin@gmail.com',
            'user_id' => 1,
            'hinh_anh' => 'utc1.jpg'
        ]);
    }
}
