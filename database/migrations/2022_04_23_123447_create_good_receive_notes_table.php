<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodReceiveNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_receive_notes', function (Blueprint $table) {
            $table->id();
            $table->string('grn_no');
            $table->integer('index_digit')->nullable();
            $table->string('prefix_syntax')->nullable();
            $table->integer('approve_status')->default(0);
            $table->string('date');
            $table->integer('type');
            $table->integer('warehouse_flag')->default(0);
            $table->integer('status')->default(0);
            $table->integer('total_qty');
            $table->integer('change_status')->default(0);
            $table->string('project_name')->nullable();
            $table->unsignedBigInteger('project_phase_id')->nullable();
            $table->unsignedBigInteger('work_site_id')->nullable();
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
        Schema::dropIfExists('good_receive_notes');
    }
}
