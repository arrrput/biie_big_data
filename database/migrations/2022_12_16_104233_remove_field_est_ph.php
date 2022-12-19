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
        Schema::table('est_ph_engine', function (Blueprint $table) {
            //
            $table->dropColumn('id_drawing');
            $table->string('kode_drawing');
        });

        Schema::table('est_engine_file', function (Blueprint $table) {
            //
            $table->string('kode_drawing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('est_ph_engine', function (Blueprint $table) {
            //
        });
    }
};
