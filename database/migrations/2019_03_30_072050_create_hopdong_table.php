<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopdongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hopdong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ki_hoc');
            $table->string('nam_hoc');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->text('chu_thich')->nullable();
            $table->double('tien_phong');
            $table->double('tien_cuoc');
            $table->unsignedBigInteger('nhan_vien_tao');
            $table->foreign('nhan_vien_tao')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ma_sv_utc');
            $table->foreign('ma_sv_utc')
                ->references('id')->on('sinhvienutc')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ma_phong');
            $table->foreign('ma_phong')
                ->references('id')->on('phong')
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
        Schema::dropIfExists('hopdong');
    }
}
