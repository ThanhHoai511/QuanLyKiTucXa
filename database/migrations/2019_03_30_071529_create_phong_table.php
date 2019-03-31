<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ten');
            $table->integer('so_luong_sv_hien_tai');
            $table->unsignedBigInteger('ma_khu');
            $table->unsignedBigInteger('ma_loai_phong');
            $table->foreign('ma_khu')
                ->references('id')->on('khunha')
                ->onDelete('cascade');
            $table->foreign('ma_loai_phong')
                ->references('id')->on('loaiphong')
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
        Schema::dropIfExists('phong');
    }
}
