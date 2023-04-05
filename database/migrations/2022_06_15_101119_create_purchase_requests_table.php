<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pr_no');
            $table->date('pr_date');
            $table->tinyInteger('request_type');
            $table->unsignedBigInteger('material_request_id')->nullable();
            $table->unsignedBigInteger('sales_order_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('phase_id')->nullable();
            $table->date('required_date');
            $table->tinyInteger('destination_flag');
            $table->unsignedBigInteger('destination_regional_id')->nullable();
            $table->string('destination_regional_name')->nullable();
            $table->tinyInteger('approve_status');
            $table->tinyInteger('officer_sent_status');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('purchase_requests');
    }
}
