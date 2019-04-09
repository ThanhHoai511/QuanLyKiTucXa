<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaocaocsvcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baocaocsvc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ma_sv_utc');
            $table->foreign('ma_sv_utc')
                ->references('id')->on('sinhvienutc')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ma_phong_csvc');
            $table->foreign('ma_phong_csvc')
                ->references('id')->on('phong_csvc')
                ->onDelete('cascade');
            $table->tinyInteger('tinh_trang');
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
        Schema::dropIfExists('baocaocsvc');
    }
}
