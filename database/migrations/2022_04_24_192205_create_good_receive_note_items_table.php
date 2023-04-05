<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodReceiveNoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_receive_note_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grn_id');
            $table->unsignedBigInteger('grn_product_id');
            $table->integer('qty')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->integer('status')->default(0)->comment('0-not use and 1-used');
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
        Schema::dropIfExists('good_receive_note_items');
    }
}
