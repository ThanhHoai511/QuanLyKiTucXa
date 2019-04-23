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
            $table->string('ten');
            $table->tinyInteger('gioi_tinh');
            $table->date('ngay_sinh');
            $table->string('noi_sinh');
            $table->string('lop');
            $table->string('khoa');
            $table->string('ma_sinh_vien');
            $table->string('cmnd');
            $table->date('ngay_cap');
            $table->string('ho_khau_thuong_tru');
            $table->string('sdt');
            $table->string('email');
            $table->string('dia_chi_nguoi_than');
            $table->string('sdt_nguoi_than');
            $table->string('email_nguoi_than')->nullable();
            $table->string('loai_phong');
            $table->text('anh');
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
        Schema::dropIfExists('donxinnoitru');
    }
}
