<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToHoadondichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoadondichvu', function (Blueprint $table) {
            $table->bigInteger('chi_so_dau');
            $table->bigInteger('chi_so_cuoi');
            $table->integer('so_tieu_thu_cho_phep');
            $table->double('tong_tien');
            $table->tinyInteger('trang_thai')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoadondichvu', function (Blueprint $table) {
            $table->dropColumn('chi_so_dau');
            $table->dropColumn('chi_so_cuoi');
            $table->dropColumn('so_tieu_thu_cho_phep');
            $table->dropColumn('tong_tien');
            $table->dropColumn('trang_thai');
        });
    }
}
