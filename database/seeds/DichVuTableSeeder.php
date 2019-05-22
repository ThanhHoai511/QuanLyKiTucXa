<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DichVuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dichvu')->insert([
            [
                'ten' => 'Điện',
                'gia' => 2000
            ],
            [
                'ten' => 'Nuoc',
                'gia' => 10500
            ],
            [
                'ten' => 'Mạng',
                'gia' => 30000
            ]
        ]);
    }
}
