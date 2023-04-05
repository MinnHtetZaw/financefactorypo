<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_phases', function (Blueprint $table) {
            $table->id();
            $table->string('phase_name');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('project_id');
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
        Schema::dropIfExists('project_phases');
    }
}
