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
        Schema::table('table_estate_metereading', function (Blueprint $table) {
            //
            $table->integer('id_type');
            $table->renameColumn('name', 'location')->nullable();
            $table->bigInteger('electricity_consump');
            $table->bigInteger('water_consump');
            $table->dropColumn('matereading');
            $table->dropColumn('watt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_estate_metereading', function (Blueprint $table) {
            //
        });
    }
};
