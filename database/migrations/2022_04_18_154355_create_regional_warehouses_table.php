<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionalWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regional_warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse_name');
            $table->string('region');
            $table->string('country');
            $table->string('location_address');
            $table->string('area');
            $table->integer('capacity')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('sale_project_id');
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
        Schema::dropIfExists('regional_warehouses');
    }
}
