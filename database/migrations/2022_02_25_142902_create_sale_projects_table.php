<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('estimate_date');
            $table->integer('type');
            $table->string('rfq_file_path');
            $table->integer('status');
            $table->date('submission_date');
            $table->integer('year');
            $table->integer('project_value');
            $table->integer('expected_budget');
            $table->string('location');
            $table->string('project_contact_person');
            $table->integer('phone');
            $table->string('email');
            $table->string('government_department_name');
            $table->string('project_owner');
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
        Schema::dropIfExists('sale_projects');
    }
}
