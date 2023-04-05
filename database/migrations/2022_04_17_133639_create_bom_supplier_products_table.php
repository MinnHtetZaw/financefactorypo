<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomSupplierProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_supplier_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_supplier_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('requested_qty');
            $table->integer('requested_price');
            $table->string('requested_specs');
            $table->integer('available_qty');
            $table->integer('quoted_price');
            $table->string('available_specs');
            $table->integer('status');
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
        Schema::dropIfExists('bom_supplier_products');
    }
}
