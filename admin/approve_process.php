

<?php

	require '../include/init.php';

	$date = $_POST['dat'];
	$booking = $_POST['booking'];
	$status = "approved";

	$conn = new Database;
	$result = $conn->query("UPDATE shipment SET status = '$status', date_of_delivery = '$date' WHERE booking_no = '$booking'");

	echo $result;







?>