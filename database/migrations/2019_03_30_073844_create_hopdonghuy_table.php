<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopdonghuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hopdonghuy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ma_phong');
            $table->unsignedBigInteger('ma_sv_utc');
            $table->foreign('ma_phong')
                ->references('id')->on('phong')
                ->onDelete('cascade');
            $table->foreign('ma_sv_utc')
                ->references('id')->on('sinhvienutc')
                ->onDelete('cascade');
            $table->date('ngay_ket_thuc');
            $table->unsignedBigInteger('nhan_vien_tao');
            $table->foreign('nhan_vien_tao')
                ->references('id')->on('users')
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
        Schema::dropIfExists('hopdonghuy');
    }
}
