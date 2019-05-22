<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiPhongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loaiphong')->insert([
            [
                'ten' => 'Phòng 2 sinh viên',
                'gia_phong' => 2400000,
                'tien_cuoc_tai_san' => 500000,
                'so_luong_sv_toi_da' => 2,
                'dien_tich' => '30-40'
            ],
            [
                'ten' => 'Phòng 4 sinh viên',
                'gia_phong' => 1200000,
                'tien_cuoc_tai_san' => 400000,
                'so_luong_sv_toi_da' => 4,
                'dien_tich' => '30-40'
            ],
            [
                'ten' => 'Phòng 6 sinh viên',
                'gia_phong' => 800000,
                'tien_cuoc_tai_san' => 300000,
                'so_luong_sv_toi_da' => 6,
                'dien_tich' => '30-40'
            ],
            [
                'ten' => 'Phòng 8 sinh viên',
                'gia_phong' => 600000,
                'tien_cuoc_tai_san' => 200000,
                'so_luong_sv_toi_da' => 8,
                'dien_tich' => '30-40'
            ],
            [
                'ten' => 'Phòng nhỏ 4 sinh viên',
                'gia_phong' => 180000,
                'tien_cuoc_tai_san' => 400000,
                'so_luong_sv_toi_da' => 4,
                'dien_tich' => '20'
            ]
        ]);
    }
}
