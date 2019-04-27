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
            $table->unsignedBigInteger('ma_tai_khoan');
            $table->foreign('ma_tai_khoan')
                ->references('id')->on('taikhoan')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ma_sv_utc');
            $table->unsignedBigInteger('ma_phong');
            $table->foreign('ma_sv_utc')
                ->references('id')->on('sinhvienutc')
                ->onDelete('cascade');
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
