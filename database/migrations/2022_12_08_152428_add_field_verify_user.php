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
        Schema::table('gmo_it_request', function (Blueprint $table) {
            //
            $table->string('img_from_user')->nullable();
            $table->string('img_done')->nullable();
        });

        Schema::create('gmo_it_rate', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('id_request');
            $table->integer('rate')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
        });

        Schema::create('bdv_spec', function (Blueprint $table) {
            $table->id();
            $table->integer('category');
            $table->string('name');
            $table->integer('rate')->nullable();
            $table->integer('occupied');
            $table->string('price_sgd')->nullable();
            $table->string('price_idk')->nullable();
            $table->string('description')->nullable();
            $table->string('property')->nullable();
            $table->string('amenities')->nullable();
            $table->string('image')->nullable();
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
       

        
    }
};
