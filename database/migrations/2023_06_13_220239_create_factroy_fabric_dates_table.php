<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactroyFabricDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factroy_fabric_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('purchase_id');
            $table->unsignedInteger('factory_item_id');
            $table->float('arrive_quantity');
            $table->string('remark');
            $table->date('arrive_date');
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
        Schema::dropIfExists('factroy_fabric_dates');
    }
}
