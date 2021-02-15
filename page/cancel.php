<?php

	include('../include/init.php');


	$date = $_POST['date'];
	$booking = $_POST['booking'];

	$con = new Database();
	$result = $con->query("UPDATE shipment SET status = 'cancelled', date_of_delivery = 'null', cancelled_date = '$date', cancelled_by = 'self' WHERE booking_no = '$booking'");

	echo $result;

	//$conn = mysqli_connect("localhost", "root", "", "consignment");
	// $query = mysqli_query($conn, "UPDATE shipment SET status = 'cancelled', date_of_delivery = 'null', cancelled_date = '$date', cancelled_by = 'self' WHERE booking_no = '$booking'");

	// echo $query;











?>