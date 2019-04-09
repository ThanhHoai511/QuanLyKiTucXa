<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonphongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonphong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ma_hop_dong');
            $table->double('tong_tien');
            $table->foreign('ma_hop_dong')
                ->references('id')->on('hopdong')
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
        Schema::dropIfExists('hoadonphong');
    }
}
