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
        Schema::create('est_wwtp_list_content', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('capacity');
            $table->string('document');
            $table->timestamps();
        });

        Schema::create('est_wwtp_layout_content', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('capacity');
            $table->string('document');
            $table->timestamps();
        });

        Schema::create('est_wwtp_lab_content', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sample_location');
            $table->string('sample_date');
            $table->string('document');
            $table->timestamps();
        });

        Schema::create('est_wwtp_drawing_content', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('usage');
            $table->string('merk');
            $table->string('type');
            $table->string('capacity');
            $table->string('power');
            $table->string('voltage');
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
        Schema::dropIfExists('table_wwtp_list_content');
    }
};
