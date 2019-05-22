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
            $table->string('noi_sinh')->nullable();
            $table->string('lop')->nullable();
            $table->string('khoa')->nullable();
            $table->string('gioi_tinh');
            $table->string('dan_toc')->nullable();
            $table->string('cmnd')->unique();
            $table->string('sdt')->unique()->nullable();
            $table->string('sdt_bo')->nullable();
            $table->string('sdt_me')->nullable();
            $table->string('tinh')->nullable();
            $table->string('huyen')->nullable();
            $table->string('xa')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('doi_tuong')->nullable();
            $table->text('anh')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('sinhvienutc');
    }
}
