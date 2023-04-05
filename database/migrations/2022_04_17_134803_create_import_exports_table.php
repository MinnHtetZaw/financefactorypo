<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_exports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('import_process_id');
            $table->string('freight_forwarder_name');
            $table->string('forwarder_address');
            $table->string('forwarder_phone');
            $table->string('shipping_line_name');
            $table->string('shipping_line_address');
            $table->string('shipping_line_phone');
            $table->string('bill_of_loding_number');
            $table->integer('bill_of_loding_type');
            $table->string('bill_of_loading_filepath');
            $table->string('place_of_acceptance');
            $table->string('place_of_delivery');
            $table->string('port_of_loading');
            $table->string('port_of_discharge');
            $table->integer('carrier_type');
            $table->integer('movement_type');
            $table->integer('carrier_cost');
            $table->integer('pick_up_flag');
            $table->integer('pick_up_cost');
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
        Schema::dropIfExists('import_exports');
    }
}
