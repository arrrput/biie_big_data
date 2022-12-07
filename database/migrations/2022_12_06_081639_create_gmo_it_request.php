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
        Schema::create('gmo_it_request', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->bigInteger('id_department');
            $table->integer('type_request')->nullable();
            $table->string('jenis_dukungan')->nullable();
            $table->integer('email_req')->nullable();
            $table->integer('user_req')->nullable();
            $table->integer('internet_req')->nullable();
            $table->integer('backup_req')->nullable();
            $table->integer('download_req')->nullable();
            $table->integer('perangkat_komputer_req')->nullable();
            $table->integer('desain_req')->nullable();
            
            $table->string('email_desc')->nullable();
            $table->string('username_desc')->nullable();
            $table->string('download_desc')->nullable();
            $table->string('download_perangkat')->nullable();

            $table->string('deskripsi')->nullable();

            $table->integer('verify_hod')->default(0);
            $table->integer('work_by')->nullable();
            $table->integer('status')->nullable();

            $table->string('catatan')->nullable();
            
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();

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
        Schema::dropIfExists('gmo_it_request');
    }
};
