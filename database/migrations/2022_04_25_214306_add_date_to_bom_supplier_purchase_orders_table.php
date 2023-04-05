<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToBomSupplierPurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bom_supplier_purchase_orders', function (Blueprint $table) {
            //
            $table->date('po_date')->nullable()->after('supplier_po_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bom_supplier_purchase_orders', function (Blueprint $table) {
            //
        });
    }
}
