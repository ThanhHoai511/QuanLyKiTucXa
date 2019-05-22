<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuNhaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khunha')->insert([
            [
                'ten' => 'A1',
                'doi_tuong' => config('constants.NAM')
            ],
            [
                'ten' => 'A3',
                'doi_tuong' => config('constants.NAM')
            ],
            [
                'ten' => 'A4',
                'doi_tuong' => config('constants.NAM')
            ],
            [
                'ten' => 'A6',
                'doi_tuong' => config('constants.NU')
            ],
        ]);
    }
}
