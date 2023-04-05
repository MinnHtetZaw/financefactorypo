<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomSupplierQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_supplier_quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_supplier_id');
            $table->string('supplier_quotation_number');
            $table->string('quotation_file_name');
            $table->string('quotation_file_description');
            $table->string('quotation_file_path');
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
        Schema::dropIfExists('bom_supplier_quotations');
    }
}
