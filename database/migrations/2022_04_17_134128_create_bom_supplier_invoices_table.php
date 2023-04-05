<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomSupplierInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_supplier_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_supplier_id');
            $table->integer('supplier_invoice_number');
            $table->string('invoice_file_name');
            $table->string('invoice_file_description');
            $table->string('invoice_file_path');
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
        Schema::dropIfExists('bom_supplier_invoices');
    }
}
