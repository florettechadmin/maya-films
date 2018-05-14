<?php

error_reporting(E_ALL);
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 4096);

	define('BASE_PATH', dirname(__FILE__).'/../');
	define('CERT', BASE_PATH.'inc/certificates/cacert.pem');

	session_name('mayafilms');
	session_start();

	function getIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP)) {
			$ip = $client;
		}
		else if(filter_var($forward, FILTER_VALIDATE_IP)) {
			$ip = $forward;
		}
		else {
			$ip = $remote;
		}
		return $ip;
	}

	function generate_csrf_token() {
		$_SESSION['_token'] = md5(uniqid(rand(), TRUE));
	}

	function validate_csrf_token($token) {
		$csrf = $_SESSION['_token'];
		unset($_SESSION['_token']);
		return ($token == $csrf);
	}

	function contact_form($ip, $email, $name, $mobile=false, $msg=false) {
		if($mobile === false && $msg === false) {
			$message_html = file_get_contents(BASE_PATH.'inc/templates/contact-form-minimal.php');
		} else if($mobile === false) {
			$message_html = file_get_contents(BASE_PATH.'inc/templates/contact-form-message.php');
			$message_html = str_replace('[$msg;]', $msg, $message_html);
		} else if($msg === false) {
			$message_html = file_get_contents(BASE_PATH.'inc/templates/contact-form-phone.php');
			$message_html = str_replace('[$phone;]', $mobile, $message_html);
		} else {
			$message_html = file_get_contents(BASE_PATH.'inc/templates/contact-form.php');
			$message_html = str_replace('[$msg;]', $msg, $message_html);
			$message_html = str_replace('[$phone;]', $mobile, $message_html);
		}
		$message_html = str_replace('[$name;]', $name, $message_html);
		$message_html = str_replace('[$email;]', $email, $message_html);
		$message_html = str_replace('[$ip;]', $ip, $message_html);
		
		$subject = 'Maya Films';
		$boundary = uniqid('np');

		$to = 'maya@mayafilms.in';

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: {$email} \r\n";
		$headers .= "Reply-To: {$email} \r\n";
		$headers .= "To: {$to}\r\n";
		$headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";

		$message = "Name: {$name}\n\n";
		$message = "Email: {$email}\n\n";
		if($mobile !== false)
			$message = "Phone: {$mobile}\n\n";
		if($msg !== false)
			$message = "Message: {$msg}\n\n";
		$message .= "\r\n\r\n--" . $boundary . "\r\n";
		$message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
		$message .= $message_html;
		$message .= "\r\n\r\n--" . $boundary . "--";
		
		if(@mail($to, $subject, $message, $headers)) {
			return true;
		}
		return false;
	}
?>