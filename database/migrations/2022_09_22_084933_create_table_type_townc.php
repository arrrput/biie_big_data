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
        Schema::create('table_est_townc_type', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name');
            $table->timestamps();

        });

        Schema::table('table_estate_townc', function (Blueprint $table) {
            //
            $table->bigInteger('id_type');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_est_townc_type', function (Blueprint $table) {
            //
        });
    }
};
