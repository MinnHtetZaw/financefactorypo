<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomSupplierRfqProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_supplier_rfq_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_supplier_id');
            $table->unsignedBigInteger('supplier_rfq_id');
            $table->integer('product_id');
            $table->integer('requested_qty');
            $table->integer('requested_price');
            $table->string('requested_specs');
            $table->integer('available_qty');
            $table->integer('quoted_price');
            $table->string('available_specs');
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
        Schema::dropIfExists('bom_supplier_rfq_products');
    }
}
