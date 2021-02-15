<?php


require '../include/init.php';

	$date = $_POST['date'];
	$booking = $_POST['booking'];

	$conn = new Database;
	$result = $conn->query("UPDATE shipment SET status = 'cancelled', date_of_delivery = 'null', cancelled_date = '$date', cancelled_by = 'Management' WHERE booking_no = '$booking'");

	echo $result;










?>