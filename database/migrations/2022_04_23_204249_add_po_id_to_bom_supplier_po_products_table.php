<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPoIdToBomSupplierPoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bom_supplier_po_products', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('bom_po_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bom_supplier_po_products', function (Blueprint $table) {
            //
        });
    }
}
