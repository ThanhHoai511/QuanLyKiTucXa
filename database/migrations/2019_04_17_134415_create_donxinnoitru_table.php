<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonxinnoitruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donxinnoitru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ma_sinh_vien');
            $table->unsignedBigInteger('ma_loai_phong');
            $table->foreign('ma_loai_phong')
                ->references('id')->on('loaiphong')
                ->onDelete('cascade');
            $table->text('chu_thich')->nullable();
            $table->text('anh');
            $table->tinyInteger('tinh_trang')->default(0);
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
        Schema::dropIfExists('donxinnoitru');
    }
}
