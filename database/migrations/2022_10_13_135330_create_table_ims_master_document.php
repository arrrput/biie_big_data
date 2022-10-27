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
        Schema::create('ims_master_document', function (Blueprint $table) {
            $table->id();
            $table->string('no_document');
            $table->string('title');
            $table->integer('hirarki_doc');
            $table->integer('id_dept');
            $table->string('document');
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('ims_master_document');
    }
};
