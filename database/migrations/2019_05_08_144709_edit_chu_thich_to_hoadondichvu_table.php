<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditChuThichToHoadondichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoadondichvu', function (Blueprint $table) {
            $table->text('chu_thich')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoadondichvu', function (Blueprint $table) {
            $table->text('chu_thich')->nullable('false')->change();
        });
    }
}
