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
        Schema::create('hrga_employee', function (Blueprint $table) {
            //
            $table->id();
            $table->bigInteger('user_id');
            $table->string('no_emp');
            $table->string('name');
            $table->string('job_title');
            $table->string('designation');
            $table->integer('job_grade');
            $table->string('education');
            $table->string('department');
            $table->date('join');
            $table->string('sex');
            $table->string('status');
            $table->string('child');
            $table->date('dob');
            $table->string('place_of_birth');
            $table->string('stay');
            $table->string('religion');
            $table->string('kjp');
            $table->string('npwp');
            $table->string('nik');
            $table->string('status_emp');
            $table->string('no_hp');
            $table->string('email');
            $table->string('no_rek');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('hrga_job_grade', function (Blueprint $table) {
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
        Schema::table('hrga_employee', function (Blueprint $table) {
            //
        });
    }
};
