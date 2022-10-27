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
        Schema::create('cdd_proposal_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pic');
            $table->bigInteger('donation');
            $table->timestamps();
        });

        Schema::create('cdd_activity_record', function (Blueprint $table) {
            $table->id();
            $table->string('activity');
            $table->string('pic');
            $table->date('date');
            $table->string('budget');
            $table->string('remark');
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
        Schema::dropIfExists('table_cdd_proposal');
    }
};
