<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('from_account_id')->nullable();
            $table->unsignedInteger('to_account_id')->nullable();
            $table->tinyInteger('type')->comment('1-Debit,2-Credit')->nullable();
            $table->integer('amount')->nullable();
            $table->date('entry_date')->nullable();
            $table->unsignedInteger('related_entry_id')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('journal_entries');
    }
}
