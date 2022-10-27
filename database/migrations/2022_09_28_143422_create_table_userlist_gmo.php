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
        Schema::create('gmo_user_list', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name');
            $table->string('department')->nullable();
            $table->string('ip')->nullable();
            $table->string('email')->nullable();
            $table->boolean('internet')->nullable();
            $table->string('jenis')->nullable();
            $table->string('id_no')->nullable();
            $table->string('akun_pengguna')->nullable();
            $table->date('tgl_serahkan')->nullable();
            $table->date('tgl_kembalikan')->nullable();
            $table->string('lokasi')->nullable();
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
        Schema::table('gmo_user_list', function (Blueprint $table) {
            //
        });
    }
};
