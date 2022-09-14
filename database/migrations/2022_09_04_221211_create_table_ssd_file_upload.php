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
        Schema::create('ssd_file_upload', function (Blueprint $table) {
            //
            $table->id();
            $table->string('kode_ssd');
            $table->string('file');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ssd_category', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ssd_sub_category', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name');
            $table->bigInteger('id_category');
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
        Schema::table('ssd_file_upload', function (Blueprint $table) {
            //
        });
    }
};
