<?php

	require 'inc/functions.php';

	$error = array();

	if(!isset($_POST['email'])) {
		array_push($error, 'missing_email');
	} else if(preg_match('/^ *$/', $_POST['email'])) {
		array_push($error, 'blank_email');
	} else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		array_push($error, 'invalid_email');
	}
	if(!isset($_POST['name'])) {
		array_push($error, 'missing_name');
	} else if(preg_match('/^ *$/', $_POST['name'])) {
		array_push($error, 'blank_name');
	}
	if(!isset($_POST['csrf'])) {
		array_push($error, 'csrf_error');
	} else if(!validate_csrf_token($_POST['csrf'])) {
		array_push($error, 'csrf_error');
	}

	if(count($error) > 0) {
		http_response_code(422);
		echo(json_encode($error));
	} else {
		$ip = getIP();

		$email = $_POST['email'];
		$email = strtolower($email);

		$name = $_POST['name'];
		if(isset($_POST['mobile']) && !preg_match('/^ *$/', $_POST['mobile'])) {
			$mobile = $_POST['mobile'];
		} else {
			$mobile = false;
		}
		if(isset($_POST['msg']) && !preg_match('/^ *$/', $_POST['msg'])) {
			$msg = $_POST['msg'];
		} else {
			$msg = false;
		}

		if(contact_form($ip, $email, $name, $mobile, $msg)) {
			echo 'success';
		} else {
			array_push($error, 'mailer_error');
			http_response_code(422);
			echo(json_encode($error));
		}

	}

?>