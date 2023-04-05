<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infomations', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_contact');
            $table->string('company_email');
            $table->string('company_md_name');
            $table->date('financial_start_date');
            $table->date('financial_end_date');
            $table->integer('starting_capital');
            $table->integer('netprofit_pre_year');
            $table->integer('netprofit_current_year');
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
        Schema::dropIfExists('company_infomations');
    }
}
