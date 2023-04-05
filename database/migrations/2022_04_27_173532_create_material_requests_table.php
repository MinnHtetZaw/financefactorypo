<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_code')->nullable();
            $table->string('prefix_syntax')->nullable();
            $table->integer('index_digit')->nullable();
			$table->text('item_list');
			$table->date('request_date');
			$table->integer('warehouse_status')->default(0);
			$table->integer('site_status')->default(0);
			$table->date('eta_date')->nullable();
			$table->date('dispatch_date')->nullable();
			$table->date('received_date')->nullable();
			$table->string('remark')->nullable();
			$table->unsignedBigInteger('user_id')->nullable();
			$table->integer('status')->default(0);
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
        Schema::dropIfExists('material_requests');
    }
}
