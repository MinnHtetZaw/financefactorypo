<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodReceiveNoteRegionalWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_receive_note_regional_warehouse', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('good_receive_note_id');
            $table->unsignedBigInteger('regional_warehouse_id');
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
        Schema::dropIfExists('good_receive_note_regional_warehouse');
    }
}
