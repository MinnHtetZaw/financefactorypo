<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_sends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('import_process_id');
            $table->string('supplier_invoice_filepath');
            $table->string('supplier_packinglist_filepath');
            $table->string('shipper_name');
            $table->string('shipper_address');
            $table->string('shipper_tax_id');
            $table->string('shipper_ph_no');
            $table->string('consignee_name');
            $table->string('consignee_address');
            $table->string('consignee_tax_id');
            $table->string('consignee_ph_no');
            $table->string('notify_party_name');
            $table->string('notify_party_address');
            $table->string('notify_party_phno');
            $table->string('pick_up_address');
            $table->integer('total_freight_cost');
            $table->integer('insurance_cost');
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
        Schema::dropIfExists('import_sends');
    }
}
