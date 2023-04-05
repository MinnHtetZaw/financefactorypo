<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_supplier_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('supplier_rfq_id');
            $table->unsignedBigInteger('supplier_quotation_id');
            $table->string('supplier_quotation_number');
            $table->string('supplier_quotation_filepath');
            $table->unsignedBigInteger('supplier_po_id');
            $table->unsignedBigInteger('supplier_invoice_id');
            $table->string('supplier_invoice_no');
            $table->string('supplier_invoice_filepath');
            $table->unsignedBigInteger('incoterm_id');
            $table->integer('import_process_total_cost');
            $table->unsignedBigInteger('imp_send_id');
            $table->integer('imp_send_status');
            $table->unsignedBigInteger('imp_export_id');
            $table->integer('imp_export_status');
            $table->unsignedBigInteger('imp_forwarding_id');
            $table->integer('imp_forwarding_status');
            $table->unsignedBigInteger('imp_import_id');
            $table->integer('imp_import_status');
            $table->unsignedBigInteger('imp_receive_id');
            $table->integer('imp_receive_status');
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
        Schema::dropIfExists('import_processes');
    }
}
