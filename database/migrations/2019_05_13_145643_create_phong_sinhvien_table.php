<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongSinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong_sinhvien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ma_phong');
            $table->foreign('ma_phong')
                ->references('id')->on('phong')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ma_sv_utc');
            $table->foreign('ma_sv_utc')
                ->references('id')->on('sinhvienutc')
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
        Schema::dropIfExists('phong_sinhvien');
    }
}
