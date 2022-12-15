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
        Schema::create('est_power_dw_switchouse', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user'); 
            $table->string('name')->nullable();
            $table->string('substation');
            $table->string('merk');
            $table->string('outgoing');
            $table->string('breaker');
            $table->string('operating_voltage');
            $table->string('incoming');
            $table->string('manual_book');
            $table->string('document');
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
        Schema::dropIfExists('est_power_dw_switchouse');
    }
};
