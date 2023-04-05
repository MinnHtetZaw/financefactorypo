<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_number');
            $table->string('supplier_name');
            $table->integer('total_quantity');
            $table->integer('total_price');
            $table->integer('credit_amount');
            $table->date('purchase_date');
            $table->integer('purchase_by');
            $table->text('purchase_remark');
            $table->unsignedBigInteger('supplier_id')->comment('created by')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
        Schema::dropIfExists('purchases');
    }
}
