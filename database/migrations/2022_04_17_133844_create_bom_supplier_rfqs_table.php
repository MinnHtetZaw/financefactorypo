<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomSupplierRfqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_supplier_rfqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_supplier_id');
            $table->string('supplier_rfq_number');
            $table->string('rfq_email_title');
            $table->string('rfq_email_description');
            $table->string('rfq_email_filepath');
            $table->integer('rfq_total_qty');
            $table->integer('rfq_total_price');
            $table->integer('rfq_typeqty');
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
        Schema::dropIfExists('bom_supplier_rfqs');
    }
}
