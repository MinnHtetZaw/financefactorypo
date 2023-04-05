<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppointmentIdToVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->integer('clinicvoucher_status')->nullable()->comment("for clinic record = 0, voucher = 1");
            $table->integer('medicine_charges')->nullable();
            $table->integer('service_charges')->nullable();
            $table->integer('doctor_charges')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers', function (Blueprint $table) {
        });
    }
}
