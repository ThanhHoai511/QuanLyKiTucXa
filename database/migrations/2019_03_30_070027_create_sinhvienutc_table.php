<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinhvienutcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhvienutc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ma_sinh_vien')->unique();
            $table->string('ho_ten');
            $table->date('ngay_sinh');
            $table->string('noi_sinh');
            $table->string('lop');
            $table->string('khoa');
            $table->string('dan_toc');
            $table->string('cmnd')->unique();
            $table->string('sdt')->unique();
            $table->string('sdt_bo')->unique();
            $table->string('sdt_me')->unique();
            $table->string('tinh');
            $table->string('huyen');
            $table->string('xa');
            $table->string('ten_dang_nhap')->unique();
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->tinyInteger('doi_tuong');
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
        Schema::dropIfExists('sinhvienutc');
    }
}
