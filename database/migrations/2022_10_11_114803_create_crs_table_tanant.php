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
        Schema::create('crs_tanant_request', function (Blueprint $table) {
            $table->id();
            $table->string('name_tenant');
            $table->string('description');
            $table->bigInteger('id_department');
            $table->date('target_completion');
            $table->string('status');
            $table->string('received_by');
            $table->string('pic');
            $table->string('root_cause');
            $table->string('correction');
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
        Schema::dropIfExists('crs_table_tanant');
    }
};
