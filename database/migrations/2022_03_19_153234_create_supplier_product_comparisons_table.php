<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierProductComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_product_comparisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('primary_flag');
            $table->integer('unit_purchase_price');
            $table->integer('currency_id');
            $table->integer('discount_type');
            $table->integer('discount_value');
            $table->unsignedBigInteger('incoterm_id');
            $table->date('last_purchase_date');
            $table->integer('total_purchase_qty');
            $table->integer('total_purchase_amount');
            $table->integer('delivery_lead_time');
            $table->integer('lead_time_type');
            $table->integer('discount_condition');
            $table->integer('discount_condition_value');
            $table->integer('credit_term_type');
            $table->integer('credit_term_value');
            $table->integer('credit_condition');
            $table->integer('credit_condition_value');
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
        Schema::dropIfExists('supplier_product_comparisons');
    }
}
