<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodReceiveNoteProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_receive_note_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('good_receive_note_id');
            $table->integer('qty');
            $table->string('supplier');
            $table->integer('purchase_price');
            $table->unsignedBigInteger('product_id');
            $table->integer('change_status');
            $table->string('remark');
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
        Schema::dropIfExists('good_receive_note_product');
    }
}
