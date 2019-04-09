<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ten_dang_nhap')->unique();
            $table->string('mat_khau');
            $table->tinyInteger('tinh_trang');
            $table->unsignedBigInteger('ma_nhan_vien');
            $table->foreign('ma_nhan_vien')
                ->references('id')->on('nhanvien')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taikhoan');
    }
}
