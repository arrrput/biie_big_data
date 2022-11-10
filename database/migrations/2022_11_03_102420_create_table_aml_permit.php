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
        Schema::create('aml_permit_document', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('permit_owner');
            $table->integer('permit_type');
            $table->string('description');
            $table->date('issued_date');
            $table->string('document');
            $table->string('start_date');
            $table->string('end_date');
            $table->timestamps();
        });

        Schema::create('aml_permit_owner', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
        });

        Schema::create('aml_permit_type', function (Blueprint $table) {
            $table->id();
            $table->integer('id_permit_owner');
            $table->string('name');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_aml_permit');
    }
};
