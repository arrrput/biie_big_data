<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrga_gasoline', function (Blueprint $table) {
            $table->id();
            $table->string('merk_plat_no');
            $table->string('driver');
            $table->bigInteger('km');
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('hrga_dorm', function (Blueprint $table) {
            $table->id();
            $table->integer('id_blok');
            $table->integer('id_unit');
            $table->string('name');
            $table->integer('id_dept');
            $table->integer('room_no');
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
        Schema::dropIfExists('table_hrga_gasoline');
    }
};
