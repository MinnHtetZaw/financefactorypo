<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('material_issue_no');
            $table->integer('index_digit');
            $table->string('prefix_syntax');
            $table->unsignedBigInteger('purchase_order_id');
            $table->unsignedBigInteger('material_request_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('phase_id');
            $table->integer('total_qty');
            $table->integer('total_type');
            $table->integer('approve');
            $table->integer('approve_delivery_order');
            $table->integer('warehouse_transfer_status');
            $table->integer('delivery_order_status');
            $table->unsignedBigInteger('regional_warehouse_id');
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
        Schema::dropIfExists('material_issues');
    }
}
