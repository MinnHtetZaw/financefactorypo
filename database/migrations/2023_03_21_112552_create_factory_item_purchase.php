<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactoryItemPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factory_item_purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('factory_item_id');
            $table->unsignedInteger('purchase_id');
            $table->integer('quantity');
            $table->integer('arrive_quantity')->default(0);
            $table->integer('arrive_complete')->default(0);
            $table->integer('price');
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
        Schema::dropIfExists('factory_item_purchase');
    }
}
