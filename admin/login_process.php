


<?php

	

	$admin = $_POST['username'];
	$pass = $_POST['password'];
	if($admin == 'achawayne' && $pass == '12345'){
		session_start();
		$_SESSION['admin'] = $admin;

		echo '1';
	}




?>