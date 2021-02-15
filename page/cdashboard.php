
<?php

	require_once '../include/init.php';

	$approved = Consignment::get_approved_shipping($_SESSION['user_id']);
	$approved_output = "";

	if($approved->num_rows == 0){
		$approved_output = "<tr><td colspan='4' class='push-center'>No Approved Shipping Item</td></tr>";
	}else{

		while($row = mysqli_fetch_array($approved)){
			$date = $row['date_of_booking'];
			$booking = $row['booking_no'];
			$status = $row['status'];

			$approved_output .= "<tr>";
			$approved_output .= "<td class='label-text'>$date</td>";
			$approved_output .= "<td class='label-text'>$booking</td>";
			$approved_output .= "<td class='label-text'><span class='status-style'>$status</span></td>";
			$approved_output .= "<td class='label-text'>";

			if($status == "cancelled"){
				$approved_output .= "<button class='btn btn-default disabled'>Inactive</button>";
			}else{

			$approved_output .= "<a class='btn btn-success' href='http://localhost/consign/page/cdashboard.php?booking=$booking'>View</a>";
			}			
			$approved_output .=	"</td>";
			$approved_output .= "</tr>";
		}
	}




	// Unapproved Shipping
	$unapproved = Consignment::get_unapproved_shipping($_SESSION['user_id']);
	$unapproved_output = "";

	if($unapproved->num_rows == 0){
		$unapproved_output = "<tr><td colspan='4' class='push-center'>No Unapproved Shipping Item</td></tr>";
	}else{
		while($row = mysqli_fetch_array($unapproved)){
			$date = $row['date_of_booking'];
			$booking = $row['booking_no'];
			$status = $row['status'];

			$unapproved_output .= "<tr>";
			$unapproved_output .= "<td class='label-text'>$date</td>";
			$unapproved_output .= "<td class='label-text'>$booking</td>";
			$unapproved_output .= "<td class='label-text'><span class='status-style'>$status</span></td>";
			$unapproved_output .= "<td class='label-text'>";

			if($status == "cancelled"){
				$unapproved_output .= "<button class='btn btn-default disabled'>Inactive</button>";
			}else{
				$unapproved_output .= "<a class='btn btn-success' href='http://localhost/consign/page/cdashboard.php?booking=$booking'>View</a>";
			}			
			$unapproved_output .=	"</td>";
			$unapproved_output .= "</tr>";
		}
	}


	$cancelled = Consignment::get_cancelled_shipping($_SESSION['user_id']);
	$cancelled_output = '';

	if($cancelled->num_rows == 0){
		$cancelled_output = "<tr><td colspan='4' class='push-center'>No Cancelled Shipping Item</td></tr>";
	}else{
		while($row = mysqli_fetch_array($cancelled)){
			$date = $row['date_of_booking'];
			$booking = $row['booking_no'];
			$status = $row['status'];

			$cancelled_output .= "<tr>";
			$cancelled_output .= "<td class='label-text'>$date</td>";
			$cancelled_output .= "<td class='label-text'>$booking</td>";
			$cancelled_output .= "<td class='label-text'><span class='status-style'>$status</span></td>";
			$cancelled_output .= "<td class='label-text'>";

			// if($status == "cancelled"){
			// 	$cancelled_output .= "<button class='btn btn-default disabled'>Inactive</button>";
			// }else{
				$cancelled_output .= "<a class='btn btn-success' href='http://localhost/consign/page/cdashboard.php?booking=$booking'>View</a>";
			//}			
			$cancelled_output .="</td>";
			$cancelled_output .= "</tr>";
		}
	}



	if(isset($_GET['booking'])){
		$booking = trim($_GET['booking']);
		$booking_details = Consignment::get_booking_details($booking);

	}

	if(isset($_GET['logout'])){
		Session::log_user_out();
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/index-media.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard-media.css">
</head>
<body>
	<div class="container-fluid">
		<?php include('../template/header.php'); ?>

		<div class="row">
			<div class="col-lg-2 col-md-2 visible-lg visible-md user-dashboard-side-bar" style="">
				<ul id="ul-side-bar">
					<li id="user-icon-con"><span class="fa fa-user user-icon"></span></li>
					<a href="http://localhost/consign/page/booking.php" class="side-bar-links"><li class="side-bar-item"><span class="fa fa-plane"></span> Book Shipping</li></a>
					<!-- <li><span class="fa fa-plane"></span> My Shipments</li>
					<li><span class="fa fa-dashboard"></span> Print Invoice</li> -->
					<a href="cdashboard.php?logout=true" class="side-bar-links"><li class="side-bar-item"><span class="fa fa-sign-out"></span> Sign Out</li></a>
				</ul>
			</div>


			<div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-sm-12 col-xs-12" style="padding: 0px">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: rgb(165, 255, 255); border-bottom: 1px groove orange">
					<h4 style="">Hi <?php echo $_SESSION['user_id']; ?></h4>
					<a href="http://localhost/consign/page/logout.php" style="color: black; text-decoration: none"><h6 style="cursor: pointer;"><span class="fa fa-sign-out"></span> Sign Out</h6></a>
				</div>
				
				<div class="col-ship-pro">
				<!---=====Unapproved Shpment====---->
				<div class="col-lg-5 col-md-5">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h3 class="topic-title" style="text-align: center;">Unapproved Shipment Status</h3>
							<h6 class="info-text">Shipment list & Status</h6>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table class="table">
								<tr>
									<th class="label-text">Date of Booking</th>
									<th class="label-text">Booking No</th>
									<th class="label-text">Status</th>
									<th class="label-text">Action</th>
								</tr>	
								<?php echo $unapproved_output; ?>					
							</table>
						</div>

					<!----=====Cancelled Shipment=====---->
						<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
							<h3 class="topic-title" style="text-align: center;">Cancelled Shipment</h3>
							<h6 class="info-text">Shipment list & Status</h6>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table class="table">
								<tr>
									<th class="label-text">Date of Booking</th>
									<th class="label-text">Booking No</th>
									<th class="label-text">Status</th>
									<th class="label-text">Action</th>
								</tr>
								<?php echo $cancelled_output; ?>
							</table>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h3 class="topic-title">Approved Booking</h3>
							<h6 class="info-text">Here are your approved booking table</h6>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table class="table table-responsive">
								<tr>
									<th class="label-text">Date Of Booking</th>
									<th class="label-text">Booking No</th>
									<th class="label-text">Status</th>
									<th class="label-text">Action</th>
								</tr>
								<?php echo $approved_output; ?>
							</table>
						</div>
					</div>
				</div>




				<!-----------======== View Table Col ============--------->
				<div class="view-table">
					<div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 table-view-pro">
						<?php if(isset($_GET['booking'])){ ?>
						<table class="table table-responsive">
							<tr>
								<th colspan="2" class="push-center">Booking No <?php echo $booking_details['booking_no']; ?></th>
							</tr>
							<tr>
								<th>Full Name</th>
								<td><?php echo $booking_details['full_name']; ?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $booking_details['email']; ?></td>
							</tr>
							<tr>
								<th>Phone</th>
								<td><?php echo $booking_details['phone']; ?></td>
							</tr>
							<tr>
								<th>From</th>
								<td><?php echo $booking_details['origin']; ?></td>
							</tr>
							<tr>
								<th>To</th>
								<td><?php echo $booking_details['destination']; ?></td>
							</tr>
							<tr>
								<th>Service Type</th>
								<td><?php echo $booking_details['service']; ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><?php echo $booking_details['status']; ?></td>
							</tr>
							<tr>
								<th>Date of Booking</th>
								<td><?php echo $booking_details['date_of_booking']; ?></td>
							</tr>
							<tr>
								<th>Delivery Date</th>
								<td><?php echo $booking_details['date_of_delivery']; ?></td>
							</tr>
							<tr>
								<th>Cancelled Date</th>
								<td><?php echo $booking_details['cancelled_date']; ?></td>
							</tr>
							<tr>
								<th>Cancelled By</th>
								<td><?php echo $booking_details['cancelled_by']; ?></td>
							</tr>
							<tr>
								<th>Action</th>
								<td>
									<input type="text" id="booking" value="<?php echo $booking_details['booking_no']; ?>" hidden>
									<?php if($booking_details['status'] == "cancelled"){ ?>
										<button class='btn btn-default disabled'>Inactive</button>
									<?php }else{ ?>
										<button id="yes" class="btn btn-danger">Cancel Shippment</button>
									<?php } ?>
								</td>
							</tr>
						</table>
						<?php } ?>
					</div>
					<!-----------======== View Table Col ============--------->
				</div>


			</div>
		</div>

</div><!-----=====End of Container fluid======---->




	<!----=====Confirmation Alert======----->	
	<div id="confirm1" class='container-fluid' style='background-color: black; opacity: .5; height: 700px; position: fixed; top: 0px; width: 100%; z-index: 99999999; display: none'>

	</div>

	<div id="confirm2" class='col-lg-4 col-lg-offset-4 alert alert-success' style='position: fixed; top: 100px; z-index: 9999999999; display: none'>
		<h4 style='text-align: center'>Shipment Has Been Cancelled</h4>
		<div style='text-align: center'>
			<button class='btn btn-warning ok'>Ok</button>	
		</div>
	</div>



	<script>

		$("#yes").click(function(){
			var date = new Date();
			var date1 = date.toLocaleDateString();
			var booking = $("#booking").val();

				$.post('cancel.php', {date: date1, booking: booking}, function(data, status){
						if(data == 1){
							$("#dialog1").hide();
							$("#dialog2").hide();

							$("#confirm1").show();
							$("#confirm2").show();
						}
				});
		});


		$("#no").click(function(){
			window.location = 'http://localhost/consign/page/cdashboard.php';
		});

		$(".ok").click(function(){
			window.location = 'http://localhost/consign/page/cdashboard.php';
			$("#confirm1").hide();
			$("#confirm2").hide();
			$("#confirm11").hide();
			$("#confirm22").hide();
		});

	</script>





</body>
</html>