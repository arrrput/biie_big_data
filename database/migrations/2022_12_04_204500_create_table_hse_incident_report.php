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
        Schema::create('hse_incident_report', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl');
            $table->string('jam');
            $table->integer('id_department');
            $table->string('kategori_kecelakaan');
            $table->string('penyebab');
            $table->string('bagian_terluka');
            $table->string('alat_penyebab');
            $table->string('kronologi');
            $table->string('analisa_kejadian');
            $table->string('tindakan_perbaikan');
            $table->string('tindakan_pencegahan');

            $table->timestamps();
        });

        Schema::create('hse_apar', function (Blueprint $table) {
            $table->id();
            $table->string('no_apar');
            $table->string('lokasi');
            $table->string('periode');
            $table->date('tgl');
            $table->string('tekanan_tabung');
            $table->string('fisik_tabung');
            $table->timestamps();
        }); 

        Schema::create('hse_p3k', function (Blueprint $table) {
            $table->id();
            $table->string('no_p3k');
            $table->string('lokasi');
            $table->date('tgl');
            $table->string('nama');
            $table->string('contact');
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
        Schema::dropIfExists('table_hse_incident_report');
    }
};
