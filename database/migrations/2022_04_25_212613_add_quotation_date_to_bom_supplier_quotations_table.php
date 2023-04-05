<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuotationDateToBomSupplierQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bom_supplier_quotations', function (Blueprint $table) {
            //
            $table->date('quotation_date')->nullable()->after('supplier_quotation_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bom_supplier_quotations', function (Blueprint $table) {
            //
        });
    }
}
