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
        Schema::create('table_estate_factory', function (Blueprint $table) {
            //
            $table->id();
            $table->string('lot');
            $table->string('name_tenant')->nullable();
            $table->integer('id_factory_category');
            $table->integer('status_vacant');
            $table->date('hod')->nullable();
            $table->date('eol')->nullable();
            $table->float('land_area')->nullable();
            $table->string('satuan')->nullable();
            $table->string('status_building')->nullable();
            $table->timestamps();

        });

        Schema::create('table_estate_dormitory', function (Blueprint $table) {
            //
            $table->id();
            $table->string('block');
            $table->string('unit')->nullable();
            $table->integer('name_tenant');
            $table->integer('status_vacant');
            $table->integer('vacant')->nullable();
            $table->date('hod')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();

        });

        Schema::create('table_estate_townc', function (Blueprint $table) {
            //
            $table->id();
            $table->string('stall_no')->nullable();
            $table->string('name_stall')->nullable();
            $table->date('hod')->nullable();
            $table->string('remark');
            $table->timestamps();

        });

        Schema::create('table_estate_metereading', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name')->nullable();
            $table->string('matereading')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->float('watt');
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
        Schema::table('table_estate_factory', function (Blueprint $table) {
            //
        });
    }
};
