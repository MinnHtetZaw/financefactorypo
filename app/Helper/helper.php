<?php


if (!function_exists('getUserId')) {

	function getUserId($request) {

		$user = $request->session()->get('user');

		$user_id = $user->id;


		return $user_id;
	}

}


?>