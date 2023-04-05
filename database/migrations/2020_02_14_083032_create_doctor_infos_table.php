<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_range');
            $table->integer('maximum_token');
            $table->integer('reserved_token');
            $table->integer('status');
            $table->unsignedBigInteger('doctor_id');
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
        Schema::dropIfExists('doctor_infos');
    }
}
