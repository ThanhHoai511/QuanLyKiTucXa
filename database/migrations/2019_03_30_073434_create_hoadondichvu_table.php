<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadondichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadondichvu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->double('gia');
            $table->text('chu_thich')->nullable();
            $table->unsignedBigInteger('ma_phong');
            $table->unsignedBigInteger('ma_dich_vu');
            $table->foreign('ma_phong')
                ->references('id')->on('phong')
                ->onDelete('cascade');
            $table->foreign('ma_dich_vu')
                ->references('id')->on('dichvu')
                ->onDelete('cascade');
            $table->unsignedBigInteger('nhan_vien_tao');
            $table->foreign('nhan_vien_tao')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger('chi_so_dau');
            $table->bigInteger('chi_so_cuoi');
            $table->integer('so_tieu_thu_cho_phep');
            $table->double('tong_tien');
            $table->tinyInteger('trang_thai')->default(0);
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
        Schema::dropIfExists('hoadondichvu');
    }
}
