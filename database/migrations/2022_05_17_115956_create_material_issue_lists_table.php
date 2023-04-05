<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialIssueListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_issue_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_issue_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('stock_qty');
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
        Schema::dropIfExists('material_issue_lists');
    }
}
