<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin123'),
            'status' => config('constants.HOAT_DONG'),
            'is_access' => config('constants.DUOC_TRUY_CAP')
        ]);
    }
}
