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
        Schema::create('crs_tenant_database', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('image')->default('tenant.png')->nullable();
            $table->string('type_product');
            $table->date('start_date');
            $table->string('occupied_factory');
            $table->string('contact_no')->nullable();
            $table->string('pic');
            $table->string('designation');
            $table->string('email');
            $table->string('hr_manager');
            $table->string('remark')->nullable();
            $table->string('total_employee')->nullable();
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
        Schema::dropIfExists('table_tenant_database');
    }
};
