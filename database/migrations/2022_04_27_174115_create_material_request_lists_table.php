<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialRequestListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_request_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_request_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('request_qty');
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
        Schema::dropIfExists('material_request_lists');
    }
}
