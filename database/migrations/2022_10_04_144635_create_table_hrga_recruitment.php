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
        Schema::create('hrga_recruitment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_department');
            $table->string('job_position');
            $table->bigInteger('id_progress');
            $table->date('due_date');
            $table->timestamps();
        });

        Schema::create('hrga_status_recruitment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('name');
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
        Schema::dropIfExists('table_hrga_recruitment');
    }
};
