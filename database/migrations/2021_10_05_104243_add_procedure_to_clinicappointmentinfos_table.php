<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProcedureToClinicappointmentinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinicappointmentinfos', function (Blueprint $table) {
            $table->text('complaint');
            $table->integer('pr');
            $table->text('procedure');
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
