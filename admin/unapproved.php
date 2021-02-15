

<?php

	require_once '../include/init.php';
	if(!isset($_SESSION['admin'])){
		redirect('index.php');
	}

	$unapproved_booking = Consignment::admin_get_unapproved_booking();

	$output = '';

		if($unapproved_booking->num_rows == 0){
			$output .= "<tr>
							<td colspan='7'>No Unapproved Booking</td>
						</tr>";
		}else {

			while($row = mysqli_fetch_array($unapproved_booking)){
				$date = $row['date_of_booking'];
				$booking = $row['booking_no'];
				$from = $row['origin'];
				$name = $row['full_name'];
				$to = $row['destination'];
				$email = $row['email'];
				$status = $row['status'];

				$output .= "<tr>";
				$output .= "<td>$date</td>";
				$output .= "<td>$booking</td>";
				$output .= "<td>$from</td>";
				$output .= "<td>$to</td>";
				$output .= "<td>$name ($email)</td>";
				$output .= "<td><span id='unapproved-cancelled'>$status</span></td>";
				$output .= "<td><a class='btn btn-primary' href='approve.php?booking=$booking'>Approve</a>	
								<a href='unapproved.php?cancel=$booking' class='btn btn-warning'>Cancel</a>	
								</td>";
				$output .= "</tr>";
			}
			
		}

		
		$msg = '';

		if(isset($_GET['cancel'])){
			$booking = $_GET['cancel'];
			$result = Consignment::admin_cancel_booking($booking);

			if($result){
				redirect('unapproved.php');
				$msg = 'Booking Shippment has been cancelled';
			}else{
				$msg = 'Something went wrong, try again';
			}

		}
		




?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Unapproved</title>
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

			<div class="col-lg-10 col-lg-offset-2 col-un-section">
				<!--=====Section 1======----->
				<div class="col-lg-12 unapproved-section-one">
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

				<div class="col-lg-12 section-two-col-unapproved">
					<h5><span id="admin-dash-text">Admin Dashboard</span> \  <span>Manage Shipment</span></h5>
				</div>

				<div class="col-lg-12 admin-body-content">
					<h3 id="unapproved-text">Unapproved Shipment</h3>
					<?php if(!empty($msg)){ ?>
						<div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 alert alert-success">
							<?php echo $msg; ?>
						</div>
					<?php } ?>
					<hr>
					<table class="table table-bordered">
						<tr>
							<th>Booking Date</th>
							<th>Booking No.</th>
							<th>From</th>
							<th>To</th>
							<th>Customer</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
						<?php echo $output; ?>
					</table>
					
				</div>

				
			</div>	
		</div><!----====End of row====---->
	</div>
	<!--======End of container fluid====---->


<script>

		function cancelBooking(booking){
			alert(booking + " " + "gshshh");
		}


</script>
</body>
</html>