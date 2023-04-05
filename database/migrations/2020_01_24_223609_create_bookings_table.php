<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('bookings', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('age');
			$table->string('phone');
			$table->string('address')->nullable();
			$table->date('booking_date');
			$table->time('est_time')->nullable();
			$table->string('token_number')->nullable();
			$table->integer('status');
			$table->string('relation')->default("operator");
			$table->integer('submit_by')->default(0);
			$table->unsignedBigInteger('doctor_id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('floor_id');
			$table->unsignedBigInteger('schedule_change_log_id')->nullable();
			$table->foreign('schedule_change_log_id')->references('id')->on('schedule_change_logs')->onDelete('cascade');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('bookings');
	}
}
