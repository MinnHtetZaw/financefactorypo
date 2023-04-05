<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdvanceTimeAndTimePerPatientToDoctorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_infos', function (Blueprint $table) {
            $table->string('advance_time')->after('reserved_token');
            $table->string('time_per_patient')->after('advance_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_infos', function (Blueprint $table) {
            //
        });
    }
}
