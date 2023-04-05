<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
			$table->unsignedBigInteger('shelve_id')->nullable();
			$table->string('model_number');
			$table->string('measuring_unit');
			$table->string('name');
			$table->integer('stock_qty');
			$table->string('reorder_qty');
			$table->string('minnimum_order_qty');
			$table->string('purchase_price');
			$table->string('retail_price');
			$table->string('wholesale_price');
			$table->integer('discount_flag');
			$table->integer('discount_type');
			$table->string('location');
			$table->date('reg_date');
            $table->string('photo');
            $table->string('serial_number');
            $table->date('purchase_date');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('description');
            $table->integer('selling_price');
            $table->integer('department_id');
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
        Schema::dropIfExists('products');
    }
}
