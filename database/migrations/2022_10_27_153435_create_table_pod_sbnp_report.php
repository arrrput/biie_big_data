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
        Schema::create('pod_sbnp_report', function (Blueprint $table) {
            $table->id();
            $table->string('name_location');
            $table->string('position');
            $table->string('dsi');
            $table->string('type');
            $table->string('power_source');
            $table->string('beacon_construction');
            $table->string('construction_height');
            $table->string('construction_color');
            $table->string('visible_distance');
            $table->string('remark');
            $table->timestamps();
        });

        Schema::create('pod_beaco_report', function (Blueprint $table) {
            $table->id();
            $table->string('dsi');
            $table->string('type');
            $table->string('location_name');
            $table->string('power_source');
            $table->string('root_cause');
            $table->integer('number_day');
            $table->string('remark');
            $table->timestamps();
        });

        Schema::create('pod_facility_permit', function (Blueprint $table) {
            $table->id();
            $table->string('license_no');
            $table->date('date_issue');
            $table->string('permission_type');
            $table->date('validity_period');
            $table->string('instantion_permit');
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
        Schema::dropIfExists('table_pod_sbnp_report');
    }
};
