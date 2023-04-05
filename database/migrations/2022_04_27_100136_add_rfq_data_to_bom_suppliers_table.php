<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRfqDataToBomSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bom_suppliers', function (Blueprint $table) {
            //
            $table->string('rfq_email_title');
            $table->string('rfq_email_description');
            $table->string('rfq_email_filepath');
            $table->integer('rfq_total_qty');
            $table->integer('rfq_total_price');
            $table->integer('rfq_type_qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bom_suppliers', function (Blueprint $table) {
            //
        });
    }
}
