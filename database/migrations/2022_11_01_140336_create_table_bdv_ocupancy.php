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
        Schema::create('bdv_ocupancy', function (Blueprint $table) {
            $table->id();
            $table->string('room');
            $table->string('company')->nullable();
            $table->string('guest')->nullable();
            $table->string('period')->nullable();
            $table->string('occupied');
            $table->string('cekin_cekout');
            $table->string('guest_name')->nullable();
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
        Schema::dropIfExists('bdv_ocupancy');
    }
};
