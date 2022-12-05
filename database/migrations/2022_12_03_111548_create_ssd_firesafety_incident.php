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
        Schema::create('ssd_firesafety_incident_record', function (Blueprint $table) {
            $table->id();
            $table->string('fire_engine');
            $table->string('waktu_keluar');
            $table->string('waktu_tiba');
            $table->string('kembali');
            $table->string('team_leader');
            $table->string('waktu_respon');
            $table->string('anggota_pemadam');

            $table->string('nama');
            $table->string('alamat');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('keterangan_korban');
            $table->string('keterangan_umum')->nullable();
            $table->timestamps();
        });

        Schema::create('ssd_firesafety_fire_alarm', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->string('break_glass');
            $table->string('smoke_detector');
            $table->string('detector_panas');
            $table->string('alarm');
            $table->string('jumlah');
            $table->string('inspection');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('ssd_firesafety_incident');
    }
};
