

<?php

	require '../include/init.php';

		if(!(isset($_SESSION['admin']))){
			redirect('index.php');

		}

		$conn = new Database;
		$query2 = $conn->query("SELECT * FROM shipment WHERE status ='approved'");
		$num2 = mysqli_num_rows($query2);

		/*=======Approved Shipmet=======*/

		$query22 = $conn->query("SELECT * FROM shipment WHERE status ='approved'");
		$num22 = mysqli_num_rows($query22);

		$output2 = "";

		if($num2 != 0){

				while($row2 = mysqli_fetch_array($query2)){
				$date = $row2['date_of_booking'];
				$booking = $row2['booking_no'];
				$from = $row2['state_of_origin'];
				$name = $row2['full_name'];
				$to = $row2['destination'];
				$email = $row2['email'];
				$status = $row2['status'];
				$date_of_delivery = $row2['date_of_delivery'];

				$output2 .= "<tr>";
				$output2 .= "<td>$date</td>";
				$output2 .= "<td>$booking</td>";
				$output2 .= "<td>$from</td>";
				$output2 .= "<td>$to</td>";
				$output2 .= "<td>$name ($email)</td>";
				$output2 .= "<td><span id='approved-status'>$status</span></td>";
				$output2 .= "<td>$date_of_delivery</td>";
				$output2 .= "</tr>";
			}

		}else{
			$output2 .= "<tr>";
			$output2 .= "<td colspan='6' id='empty-approved'>Shpiment list is empty</td>";
			$output2 .= "</tr>";
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript" src="js/index.js"></script>
	<style>
		body{

			background-color: rgb(255, 255, 218);
		}
		
	</style>
</head>
<body>

	<div class="container-fluid">
		<div class="row">

			<?php include('menu.php'); ?>

			<div class="col-lg-10 col-lg-offset-2" style="padding: 0px;">

				<!--=====Section 1======----->
				<div class="col-lg-12 section-one-approved">
					<div class="col-lg-6">
						<h4><span class="glyphicon glyphicon-user"></span> Admin Panel</h4>
						<a href="http://localhost/consign/admin/logout.php" class="admin-panel-link"><h5><span class="fa fa-sign-out"></span> Sign Out</h5></a>
					</div>

					<div class="col-lg-3 col-lg-offset-3">
						<h4 class="date"></h4>
						<h4 class="time"></h4>
					</div>	
				</div>
				<!---====End of Section1====---->

				<div class="col-lg-12 approved-sec-col-two">
					<h5><span id="approved-text-sec-two">Admin Dashboard</span> \  <span>Manage Shipment</span></h5>
				</div>


				<div class="col-lg-12 admin-body-content">
					<h3 class="text-center">Approved Shipment</h3>
					<h4><?php echo $num22; ?> Approved Shipment</h4>

					<hr>
					<table class="table table-bordered">
						<tr>
							<th>Booking Date</th>
							<th>Booking No.</th>
							<th>From</th>
							<th>To</th>
							<th>Customer</th>
							<th>Status</th>
							<th>Date of Delivery</th>
						</tr>

						<?php echo $output2; ?>

					</table>
				</div>

				
			</div><!---====End of body Col------->

		</div><!----====End of row====---->
	</div>
	<!--======End of container fluid====---->
</body>
</html>