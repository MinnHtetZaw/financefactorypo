<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_imports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('import_process_id');
            $table->string('custom_agent_name');
            $table->string('agent_address');
            $table->string('agent_phone');
            $table->boolean('import_license_flag');
            $table->date('import_license_issued_date');
            $table->date('import_license_expired_date');
            $table->integer('license_cost');
            $table->string('license_document_filepath');
            $table->integer('import_duty_percent');
            $table->integer('tax_duty_total_cost');
            $table->string('tax_duty_document_filepath');
            $table->date('cargo_release_date');
            $table->string('delivery_address');
            $table->integer('delivery_cost');
            $table->integer('labor_cost');
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
        Schema::dropIfExists('import_imports');
    }
}
