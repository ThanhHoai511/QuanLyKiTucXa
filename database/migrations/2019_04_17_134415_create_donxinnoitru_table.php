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
            $table->string('ten');
            $table->tinyInteger('gioi_tinh');
            $table->date('ngay_sinh');
            $table->string('noi_sinh');
            $table->string('cmnd');
            $table->string('sdt');
            $table->string('email');
            $table->unsignedBigInteger('ma_loai_phong');
            $table->foreign('ma_loai_phong')
                ->references('id')->on('loaiphong')
                ->onDelete('cascade');
            $table->text('chu_thich')->nullable();
            $table->text('anh');
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
