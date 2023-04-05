<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('serial_number');
            $table->string('model');
            $table->string('size');
            $table->string('color');
            $table->string('dimension');
            $table->integer('hs_code');
            $table->string('other_specification');
            $table->integer('reserved_flag');
            $table->integer('in_transit_flag');
            $table->integer('in_stock_flag');
            $table->integer('delivered_flag');
            $table->integer('active_flag');
            $table->string('description');
            $table->integer('condition_type');
            $table->string('condition_remark');
            $table->integer('unit_purchase_price');
            $table->integer('unit_selling_price');
            $table->integer('currency_type_id');
            $table->date('purchase_date');
            $table->unsignedBigInteger('supplier_id');
            $table->integer('stock_status');
            $table->date('delivered_date');
            $table->string('damage_remark');
            $table->date('registered_date');
            $table->string('item_location');
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
        Schema::dropIfExists('items');
    }
}
