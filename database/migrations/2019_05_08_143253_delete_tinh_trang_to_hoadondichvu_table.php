<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteTinhTrangToHoadondichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoadondichvu', function (Blueprint $table) {
            $table->dropColumn('tinh_trang');
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
            $table->tinyInteger('tinh_trang');
        });
    }
}
