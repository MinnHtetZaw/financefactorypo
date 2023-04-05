<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller {
	/**
	 * Place your BotMan logic here.
	 */
	public function handle() {


		$botman = app('botman');

		$botman->hears('{message}', function ($botman, $message) {

			if ($message == 'hello') {

				$this->askName($botman);
				
			} else {
				$botman->reply("write 'hello' for testing...");
			}

		});

		$botman->listen();
	}

	/**
	 * Place your BotMan logic here.
	 */
	public function askName($botman) {
		
		$botman->ask('Hello! What is your Name?', function (Answer $answer) {

			$name = $answer->getText();

			$this->say('Hello ' . $name);
		});
	}
}