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
        Schema::create('gmo_list', function (Blueprint $table) {
            //
            $table->id();
            $table->bigInteger('id_jenis_komputer');
            $table->string('merk')->nullable();
            $table->string('no_seri')->nullable();
            $table->string('no_lisensi')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('ssd')->nullable();
            $table->string('hdd')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('gmo_list_jenis_komputer', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name');
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
        Schema::table('gmo_list', function (Blueprint $table) {
            //
        });
    }
};
