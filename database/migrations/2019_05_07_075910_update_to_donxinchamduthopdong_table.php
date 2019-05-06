<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateToDonxinchamduthopdongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donxinchamduthopdong', function (Blueprint $table) {
            $table->unsignedBigInteger('nhan_vien_tao')->nullable()->change();
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
        Schema::table('donxinchamduthopdong', function (Blueprint $table) {
            $table->unsignedBigInteger('nhan_vien_tao')->change();
            $table->dropColumn('trang_thai');
        });
    }
}
