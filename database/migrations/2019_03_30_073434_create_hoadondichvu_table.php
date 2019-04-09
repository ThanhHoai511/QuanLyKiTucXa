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
            $table->integer('tinh_trang');
            $table->double('gia');
            $table->text('chu_thich');
            $table->unsignedBigInteger('ma_hop_dong');
            $table->unsignedBigInteger('ma_dich_vu');
            $table->foreign('ma_hop_dong')
                ->references('id')->on('hopdong')
                ->onDelete('cascade');
            $table->foreign('ma_dich_vu')
                ->references('id')->on('dichvu')
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
        Schema::dropIfExists('hoadondichvu');
    }
}
