<?php

	require '../include/init.php';

	
	session_start();
	session_destroy();
	redirect('index.php');


	


?>