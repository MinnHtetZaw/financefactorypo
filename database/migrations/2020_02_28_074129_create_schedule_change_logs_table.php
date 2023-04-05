<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleChangeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_change_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('request_date')->nullable();
            $table->text('request_time')->nullable();
             $table->date('initial_date');
            $table->text('initial_time');
            $table->integer('type');
            $table->integer('status');
            $table->unsignedBigInteger('request_doc_id')->nullable();
            $table->foreign('request_doc_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->text('request_doc_name')->nullable();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade'); 
            $table->integer('change_doc_type');
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
        Schema::dropIfExists('schedule_change_logs');
    }
}
