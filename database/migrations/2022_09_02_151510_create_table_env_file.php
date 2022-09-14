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
        Schema::create('env_file', function (Blueprint $table) {
            //
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name');
            $table->string('file');
            $table->string('id_category');
            $table->string('id_sub_category');
            $table->integer('status_akses');
            $table->integer('status_request');
            $table->date('due_date')->nullable();
            $table->integer('schedule_reminder')->nullable();
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
        Schema::table('env_file', function (Blueprint $table) {
            //
        });
    }
};
