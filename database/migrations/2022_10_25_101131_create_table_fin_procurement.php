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
        Schema::create('fin_procurement', function (Blueprint $table) {
            $table->id();
            $table->string('no_pr');
            $table->string('no_po');
            $table->integer('status');
            $table->integer('category');
            $table->integer('id_department');
            $table->string('no_do');
            $table->string('no_inv');
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
        Schema::dropIfExists('table_fin_procurement');
    }
};
