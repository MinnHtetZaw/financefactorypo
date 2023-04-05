<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('request_no');
            $table->unsignedBigInteger('bom_id');
            $table->unsignedBigInteger('supplier_id');
            $table->date('request_quotation_date');
            $table->date('quotation_reply_date');
            $table->integer('status');
            $table->date('po_sent_date');
            $table->date('invoice_received_date');
            $table->date('mport_start_date');
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
        Schema::dropIfExists('bom_suppliers');
    }
}
