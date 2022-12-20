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
        Schema::create('est_water_wia', function (Blueprint $table) {
            $table->id();
            $table->string('parameter');
            $table->string('unit');
            $table->string('result');
            $table->string('standart_max');
            $table->string('method');
            $table->timestamps();
        });

        Schema::table('ims_master_document', function (Blueprint $table) {
            $table->dropColumn('stamp');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('est_water_wia');
    }
};
