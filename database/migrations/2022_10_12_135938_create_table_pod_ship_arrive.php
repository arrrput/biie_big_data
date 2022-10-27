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
        Schema::create('pod_ship_arrive', function (Blueprint $table) {
            $table->id();
            $table->string('name_ship');
            $table->string('gt_flag');
            $table->date('date_arrive');
            $table->string('port_origin');
            $table->integer('demolish');
            $table->string('debarkation');
            $table->string('type_of_goods');
            $table->date('destinantion_port');
            $table->integer('payload');
            $table->string('embarkation');
            $table->string('trayek_status_l_t');
            $table->string('trayek_status_m_ch_k');
            $table->string('validate_period_rpt');
            $table->string('ppkn');
            $table->string('ppkm');
            $table->string('ppka');
            $table->string('port_location');
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
        Schema::dropIfExists('table_pod_ship_arrive');
    }
};
