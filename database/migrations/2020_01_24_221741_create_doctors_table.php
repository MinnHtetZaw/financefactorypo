<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('doctors', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('doctor_code');
			$table->text('position'); 
			$table->text('about_doc'); 
			$table->string('gender');
			$table->text('address'); 
			$table->string('phone');
			$table->string('photo');
			$table->integer('status');
			$table->unsignedBigInteger('department_id');
			$table->unsignedBigInteger('user_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('doctors');
	}
}
