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
        Schema::create('env_incident_record', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tenant_name');
            $table->string('incident');
            $table->date('incident_date');
            $table->string('close_date');
            $table->string('remark');
            $table->string('document');
            $table->timestamps();
        });

        Schema::create('env_test_record', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name_test');
            $table->string('semester');
            $table->string('year');
            $table->string('set_location');
            $table->string('coordinate_point');
            $table->string('relate_regulation');
            $table->integer('quality_standart');
            $table->date('sample_date');
            $table->string('labor_name');
            $table->string('remark');
            $table->string('document');
            $table->timestamps();
        });

        Schema::create('env_rkl_rpl', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name_tenant');
            $table->string('cat_doc');
            $table->string('doc_type');
            $table->string('sk_no');
            $table->integer('year_approval');
            $table->string('submit_date');
            $table->integer('sender');
            $table->string('receiver');
            $table->string('remark');
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
        Schema::dropIfExists('table_env_incident_record');
    }
};
