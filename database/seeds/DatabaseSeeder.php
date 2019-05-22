<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(NhanVienTableSeeder::class);
         $this->call(DichVuTableSeeder::class);
         $this->call(KhuNhaTableSeeder::class);
         $this->call(LoaiPhongTableSeeder::class);
    }
}
