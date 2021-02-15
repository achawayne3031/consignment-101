
<?php

	require_once '../include/init.php';
	if(!isset($_SESSION['admin'])){
		redirect('index.php');
	}

	$booking = $_GET['booking'];
	$result_booking = Consignment::get_booking_details($booking);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
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
			<div class="col-lg-10 col-lg-offset-2" style="padding: 0px;">

				<!--=====Section 1======----->
				<div class="col-lg-12" style="background-color: lightblue; box-shadow: 3px 2px 3px cyan">
					<div class="col-lg-6">
						<h4><span class="glyphicon glyphicon-user"></span> Admin Panel</h4>
						<a href="http://localhost/consign/admin/logout.php" style="color: black; text-decoration: none"><h5><span class="fa fa-sign-out"></span> Sign Out</h5></a>
					</div>

					<div class="col-lg-3 col-lg-offset-3">
						<h4 id="date" style="position: relative; right: 0px"></h4>
						<h4 id="time" style="font-family: Verdana; font-weight: bolder;"></h4>
					</div>	
				</div>
				<!---====End of Section1====---->

				<div class="col-lg-12" style="background-color: cyan">
					<h5><span style="color: blue">Admin Dashboard</span> \  <span>Manage Shipment</span> \ <span>Approve Shipment</span></h5>
				</div>

				<div class="col-lg-12" style="margin-top: 20px">

					<div id="alert-box" class="alert alert-success col-lg-6 col-lg-offset-3" style="display: none">
  						<strong>Shipment has been approved</strong> <a href="http://localhost/consign/admin/manage_shipment.php" style="font-size: 20px"> Go Back</a>
					</div>

					<div class="col-lg-12">
						<h3 style="text-align: center;">Approve Shipment</h3>
						<hr>
						<h4>Booking No. <span id="booking-no" style="font-weight: bolder;"><?php echo $booking; ?></span></h4>
					</div>
					

					<table class="table table-bordered">
						
						<tr>
							<td>
								<h4>Date Of Booking</h4>
								<input type='text' value='<?php echo $result_booking['date_of_booking']; ?>' class='form-control' disabled>
							</td>

							<td>
								<h4>Customer Name</h4>
								<input type='text' value='<?php echo $result_booking['full_name']; ?>' class='form-control' disabled>
							</td>

							<td>
								<h4>Email</h4>
								<input type='text' value='<?php echo $result_booking['email']; ?>' class='form-control' disabled>
							</td>

							<td>
								<h4>Phone Number</h4>
								<input type='text' value='<?php echo $result_booking['phone']; ?>' class='form-control' disabled>
							</td>
						</tr>

						<!------===End of first table row====---->


						<tr>
							<td>
								<h4>Scheduled Date Of Delivery</h4>
								<input type='text' id="mine" class='form-control' placeholder='MM/DD/YYYY'>
							</td>

							<td>
								<h4>From</h4>
								<input type='text' value='<?php echo $result_booking['origin']; ?>' class='form-control' disabled>
							</td>

							<td>
								<h4>To</h4>
								<input type='text' value='<?php echo $result_booking['destination']; ?>' class='form-control' disabled>
							</td>

							<td>
								<h4>Service Type</h4>
								<input type='text' value='<?php echo $result_booking['service']; ?>' class='form-control' disabled>
							</td>
						</tr>
						<!--====End of second table row=====----->
						<tr>
							<td>
								<h4>Status</h4>
								<input type='text' value='<?php echo $result_booking['status']; ?>' class='form-control' disabled>
							</td>
						</tr>

						<tr>
							<td><button id="approve">Approve</button></td>
						</tr>
					</table>
				</div>
			</div>
		</div><!----====End of row====---->
	</div>
	<!--======End of container fluid====---->



	<script>

		$(document).ready(function(){
			$("#mine").datepicker({changeMonth: true, changeYear: true});
			$("#approve").click(function(){
				var dat = $("#mine").val();
				var booking = $("#booking-no").html();
				if(dat != ""){
					$.post('approve_process.php', {dat: dat, booking: booking}, function(data, status){
						if(data == 1){
							$("#alert-box").show();
						}
					});
				}else{
					alert("Pick a Delivery Date");
				}
			});
		})

	</script>








</body>
</html>