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
        Schema::create('pod_import_cargo', function (Blueprint $table) {
            $table->id();
            $table->string('import_container');
            $table->string('tonnage_in_loose');
            $table->string('tonnage_cargo');
            $table->string('total_teus');
            $table->string('total_package');
            $table->string('total');
            $table->timestamps();
        });

        Schema::create('pod_export_cargo', function (Blueprint $table) {
            $table->id();
            $table->string('export_container');
            $table->string('tonnage_in_loose');
            $table->string('tonnage_cargo');
            $table->string('total_teus');
            $table->string('total_package');
            $table->string('total');
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
        Schema::dropIfExists('table_pod_import_cargo');
    }
};
