<?php
	require 'inc/functions.php';

	generate_csrf_token();
	sleep(1);
	echo $_SESSION['_token'];
	
?>