<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicappointmentinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicappointmentinfos', function (Blueprint $table) {
            $table->id();
            $table->integer('body_temperature')->nullable();
            $table->integer('bloodpressure_lower')->nullable();
            $table->integer('bloodpressure_higher')->nullable();
            $table->integer('oxygen')->nullable();
            $table->unsignedBigInteger('appointment_id');
            $table->date('next_appointmentdate')->nullable();
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
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
        Schema::dropIfExists('clinicappointmentinfos');
    }
}
