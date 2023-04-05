<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNeedFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->integer('instock_preorder')->after('measuring_unit');
            $table->string('part_no')->nullable();
            $table->unsignedBigInteger('accounting_id')->nullable();
            $table->integer('total_qty');
            $table->integer('moq_qty')->nullable();
            $table->integer('moq_price')->nullable();
            $table->integer('unit_purchase_price')->nullable()->comment('from_primary_supplier');
            $table->integer('currency_type_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
