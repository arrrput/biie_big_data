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
        Schema::table('table_bangunan', function (Blueprint $table) {
            //
            $table->integer('id_est_category');
            $table->integer('id_est_sub_category');
            $table->string('name');
            $table->dropColumn('kategori_bangunan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_bangunan', function (Blueprint $table) {
            //
        });
    }
};
