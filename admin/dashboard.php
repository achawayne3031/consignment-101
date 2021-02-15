<?php

require_once '../include/init.php';
	if(!isset($_SESSION['admin'])){
		redirect('index.php');
	}

	$recent_booking = Consignment::admin_get_recent_booking();

	if($recent_booking->num_rows == 0){
		$recent_booking_output = "<tr>
									<td colspan='6'>No Recent Booking</td>
								</tr>";
	}else{
		$recent_booking_output = "";
		$sn = 0;

		while($row = mysqli_fetch_array($recent_booking)){
			$sn++;
			$booking_no = $row['booking_no'];
			$email = $row['email'];
			$service = $row['service'];
			$status = $row['status'];
			$date = $row['date_of_booking'];

			$recent_booking_output .= "<tr>";
			$recent_booking_output .= "<td>" . $sn . "</td>";
			$recent_booking_output .= "<td>" . $booking_no . "</td>";
			$recent_booking_output .= "<td>" . $email . "</td>";
			$recent_booking_output .= "<td>" . $service . "</td>";
			$recent_booking_output .= "<td>" . $status . "</td>";
			$recent_booking_output .= "</tr>";
		}

	}


	$approved_booking = Consignment::admin_get_approved_booking();
	$unapproved_booking = Consignment::admin_get_unapproved_booking();
	$cancelled_booking = Consignment::admin_get_cancelled_booking();
	$all_users = Consignment::admin_get_all_users();

	




?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">	
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<?php include('menu.php'); ?>
			<div class="col-lg-10 col-lg-offset-2" style="padding: 0px; box-shadow: 3px 2px 3px cyan">
				<div class="col-lg-12" style="background-color: lightblue">
					<div class="col-lg-6">
						<h4><span class="glyphicon glyphicon-user"></span> Admin Panel</h4>
						<a href="http://localhost/consign/admin/logout.php" style="color: black; text-decoration: none"><h5><span class="fa fa-sign-out"></span> Sign Out</h5></a>
					</div>

					<div class="col-lg-3 col-lg-offset-3">
						<h4 id="date" style="position: relative; right: 0px"></h4>
						<h4 id="time" style="font-family: Verdana; font-weight: bolder;"></h4>
					</div>	
				</div>

				<div class="col-lg-12" style="padding-top: 20px">
					<!---======== first row ===========------>
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="dashboard-overall-display">
							<h4>Total Users</h4>
							<span class="fa fa-users admin-dashboard-icons"></span>
							<span><?php echo $all_users->num_rows; ?></span>
							</div>
						</div>

						<div class="col-lg-3 col-md-3">
							<div class="dashboard-overall-display">
							<h4>Total Booking</h4>
							<span class="fa fa-users admin-dashboard-icons"></span>
							<span><?php echo $recent_booking->num_rows; ?></span>
							</div>
						</div>

						<div class="col-lg-3 col-md-3">
							<div class="dashboard-overall-display">
							<h4>Approved Shipping</h4>
							<span class="fa fa-users admin-dashboard-icons"></span>
							<span><?php echo $approved_booking->num_rows; ?></span>
							</div>
						</div>

						<div class="col-lg-3 col-md-3">
							<div class="dashboard-overall-display">
							<h4>Cancelled Shipping</h4>
							<span class="fa fa-users admin-dashboard-icons"></span>
							<span><?php echo $cancelled_booking->num_rows; ?></span>
							</div>
						</div>
					</div>
					<!---======== End of first row ===========------>

					<div class="col-lg-12 col-md-12 second-col-row">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<h5 class="section-title">Recent Booking</h5>
								<table class="table">
									<tr>
										<th>S/N</th>
										<th>Booking No</th>
										<th>Email</th>
										<th>Service</th>
										<th>Status</th>
									</tr>
									<?php echo $recent_booking_output; ?>

								</table>

							</div>
						</div>


					</div>



				</div>	
			</div>


			
		</div><!----====End of row====---->

	</div>
	<!--======End of container fluid====---->



	<script>
		var canvas = document.getElementById("myCanvas");
		var ctx = canvas.getContext("2d");

		/////vertical line
		ctx.moveTo(20,20);
		ctx.lineTo(20,130);
		ctx.stroke();

		////Horziontal line
		ctx.moveTo(20,130);
		ctx.lineTo(250,130);
		ctx.stroke();


		//// line
		ctx.moveTo(20,130);
		ctx.lineTo(50,5);
		ctx.stroke();




	</script>
</body>
</html>