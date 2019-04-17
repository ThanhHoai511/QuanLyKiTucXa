<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tieu_de');
            $table->longText('noi_dung');
            $table->tinyInteger('loai');
            $table->tinyInteger('trang_thai');
            $table->tinyInteger('noi_bat');
            $table->text('anh');
            $table->unsignedBigInteger('ma_tai_khoan');
            $table->foreign('ma_tai_khoan')
                ->references('id')->on('taikhoan')
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
        Schema::dropIfExists('tintuc');
    }
}
