<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportForwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import__forwards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('import_process_id');
            $table->integer('carrier_type');
            $table->string('vessel/flight/truck_no');
            $table->string('voyage/flight/track_code');
            $table->date('voyage/departure_date');
            $table->date('estimate_arrival_date');
            $table->string('current_location');
            $table->float('location_lat');
            $table->float('location_long');
            $table->integer('status');
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
        Schema::dropIfExists('import__forwards');
    }
}
