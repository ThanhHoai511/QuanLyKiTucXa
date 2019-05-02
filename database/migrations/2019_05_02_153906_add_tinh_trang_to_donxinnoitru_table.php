<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTinhTrangToDonxinnoitruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donxinnoitru', function (Blueprint $table) {
            $table->tinyInteger('tinh_trang')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donxinnoitru', function (Blueprint $table) {
            $table->dropColumn('tinh_trang');
        });
    }
}
