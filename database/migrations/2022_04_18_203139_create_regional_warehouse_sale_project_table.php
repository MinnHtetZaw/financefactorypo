<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionalWarehouseSaleProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regional_warehouse_sale_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saleproject_id');
            $table->unsignedBigInteger('regional_warehouse_id');
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
        Schema::dropIfExists('regional_warehouse_sale_project');
    }
}
