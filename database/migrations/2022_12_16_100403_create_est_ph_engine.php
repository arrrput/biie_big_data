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
        // Schema::create('est_ph_engine', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_user');
        //     $table->integer('id_drawing');
        //     $table->string('engine_series')->nullable();
        //     $table->string('engine_code');
        //     $table->string('engine_type');
        //     $table->string('voltage_output');
        //     $table->string('capacity');
        //     $table->string('merk');
        //     $table->timestamps();
        // });

        Schema::table('est_engine_file', function (Blueprint $table) {
            $table->integer('id_enginee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('est_ph_engine');
    }
};
