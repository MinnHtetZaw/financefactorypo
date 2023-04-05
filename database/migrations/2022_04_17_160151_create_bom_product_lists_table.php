<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_product_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('required_qty');
            $table->integer('required_price');
            $table->string('required_spec');
            $table->integer('selected_supplier_id');
            $table->integer('selected_supplier_price');
            $table->integer('proposed_price');
            $table->integer('profit_margin');
            $table->string('file_title');
            $table->string('file_description');
            $table->string('file_path');
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
        Schema::dropIfExists('bom_product_lists');
    }
}
