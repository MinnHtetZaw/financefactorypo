<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhysicialExaminationsToClinicappointmentinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinicappointmentinfos', function (Blueprint $table) {
            $table->integer('weight_kg');
            $table->integer('weight_lb');
            $table->text('gc');
            $table->text('ht');
            $table->text('lgs');
            $table->text('abd');
            $table->text('titles')->nullable();
            $table->text('descriptions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinicappointmentinfos', function (Blueprint $table) {
            //
        });
    }
}
