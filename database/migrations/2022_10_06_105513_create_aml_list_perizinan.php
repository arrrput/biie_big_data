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
        Schema::create('aml_list_perizinan', function (Blueprint $table) {
            $table->id();
            $table->string('type_perjanjian');
            $table->string('deskripsi')->nullable();
            $table->string('no_perjanjian');
            $table->date('tgl_penerbitan')->nullable();
            $table->string('mitra')->nullable();
            $table->string('jasa')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_berakhir');
            $table->date('tgl_perpanjang')->nullable();
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
        Schema::dropIfExists('aml_list_perizinan');
    }
};
