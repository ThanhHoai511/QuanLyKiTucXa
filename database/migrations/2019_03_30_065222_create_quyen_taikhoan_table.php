<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen_taikhoan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ma_quyen');
            $table->unsignedBigInteger('ma_tai_khoan');
            $table->foreign('ma_quyen')
                ->references('id')->on('quyen')
                ->onDelete('cascade');
            $table->foreign('ma_tai_khoan')
                ->references('id')->on('taikhoan')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen_taikhoan');
    }
}
