

<?php

	require '../include/init.php';

		if(!(isset($_SESSION['admin']))){
			redirect('index.php');
		}

		$conn = new Database;
		$query = $conn->query("SELECT * FROM shipment WHERE status ='pending' LIMIT 3");
		$query1 = $conn->query("SELECT * FROM shipment WHERE status ='pending'");

		$num1 = mysqli_num_rows($query1);
		$num = mysqli_num_rows($query);


		// $conn = mysqli_connect("localhost", "root", "", "consignment");

		// $query = mysqli_query($conn, "SELECT * FROM shipment WHERE status ='pending' LIMIT 3");
		// $query1 = mysqli_query($conn, "SELECT * FROM shipment WHERE status ='pending'");
		// $num1 = mysqli_num_rows($query1);
		// $num = mysqli_num_rows($query);

		$output = "";

		if($num != 0){

			while($row = mysqli_fetch_array($query)){
				$date = $row['date_of_booking'];
				$booking = $row['booking_no'];
				$from = $row['state_of_origin'];
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
				$output .= "<td><span style='background-color: red; color: white; font-weight: bold; padding: 5px; border-radius: 5px'>$status</span></td>";
				$output .= "<td><a href='approve.php?booking=$booking'><button class='btn btn-primary'>Approve</button></a> <a href='http://localhost/consign/admin/manage_shipment.php?booking=$booking'><button class='btn btn-warning'>Cancel</button></a></td>";
				$output .= "</tr>";
			}


		}else{

			$output .= "<tr>";
			$output .= "<td colspan='7' style='text-align: center; background-color: rgb(255, 255, 189)'>Shpiment list is empty</td>";
			$output .= "</tr>";

		}



		/*=======Approved Shipmet=======*/

		$query2 = $conn->query("SELECT * FROM shipment WHERE status ='approved' LIMIT 3");
		$num2 = mysqli_num_rows($query2);

		// $query2 = mysqli_query($conn, "SELECT * FROM shipment WHERE status ='approved' LIMIT 3");
		// $num2 = mysqli_num_rows($query2);

		$query22 = $conn->query("SELECT * FROM shipment WHERE status ='approved'");
		$num22 = mysqli_num_rows($query22);


		// $query22 = mysqli_query($conn, "SELECT * FROM shipment WHERE status ='approved'");
		// $num22 = mysqli_num_rows($query22);

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
				$output2 .= "<td><span style='background-color: red; color: white; font-weight: bold; padding: 5px; border-radius: 5px'>$status</span></td>";
				$output2 .= "<td>$date_of_delivery</td>";
				$output2 .= "</tr>";
			}



		}else{

			$output2 .= "<tr>";
			$output2 .= "<td colspan='7' style='text-align: center; background-color: rgb(255, 255, 189)'>Shpiment list is empty</td>";
			$output2 .= "</tr>";

		}






		/*=======Cancelled Shipmet=======*/

		$query33 = mysqli_query($conn, "SELECT * FROM shipment WHERE status ='cancelled' LIMIT 3");
		$num33 = mysqli_num_rows($query33);

		$query3 = mysqli_query($conn, "SELECT * FROM shipment WHERE status ='cancelled'");
		$num3 = mysqli_num_rows($query3);

		$output3 = "";

		if($num33 != 0){

				while($row3 = mysqli_fetch_array($query33)){
					$date = $row3['date_of_booking'];
					$booking = $row3['booking_no'];
					$from = $row3['state_of_origin'];
					$name = $row3['full_name'];
					$to = $row3['destination'];
					$email = $row3['email'];
					$status = $row3['status'];
					$cancelled_date = $row3['cancelled_date'];
					$date_of_delivery = $row3['date_of_delivery'];
					$cancelled_by = $row3['cancelled_by'];

					$output3 .= "<tr>";
					$output3 .= "<td>$date</td>";
					$output3 .= "<td>$booking</td>";
					$output3 .= "<td>$from</td>";
					$output3 .= "<td>$to</td>";
					$output3 .= "<td>$name ($email)</td>";
					$output3 .= "<td><span style='background-color: red; color: white; font-weight: bold; padding: 5px; border-radius: 5px'>$status</span></td>";
					$output3 .= "<td>$date_of_delivery</td>";
					$output3 .= "<td>$cancelled_date</td>";
						if($cancelled_by == 'self'){
							$output3 .= "<td>User($cancelled_by)</td>";
						}else{
							$output3 .= "<td>$cancelled_by</td>";
						}
					
					$output3 .= "</tr>";
			}



		}else{

			$output3 .= "<tr>";
			$output3 .= "<td colspan='7' style='text-align: center; background-color: rgb(255, 255, 189)'>Shpiment list is empty</td>";
			$output3 .= "</tr>";

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
	

	<script type="text/javascript" src="../js/jquery.js"></script>
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
					<h5><span style="color: blue">Admin Dashboard</span> \  <span>Manage Shipment</span></h5>
				</div>

				<div class="col-lg-12" style="margin-bottom: 40px; background-color: rgb(167, 215, 153); color: black">
					<h3 style="text-align: center;">Unapproved Shipment</h3>
					<h4><?php echo $num1; ?> Unapproved Shipment</h4>
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



				<div class="col-lg-12" style="margin-bottom: 40px; background-color: rgb(167, 215, 153); color: black">
					<h3 style="text-align: center;">Approved Shipment</h3>
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






					<div class="col-lg-12" style="margin-bottom: 40px; background-color: rgb(167, 215, 153); color: black">
					<h3 style="text-align: center;">Cancelled Shipment</h3>
					<h4><?php echo $num33; ?> Cancelled Shipment</h4>
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
							<th>Cancelled Date</th>
							<th>Cancelled By</th>
						</tr>

						<?php echo $output3; ?>

					</table>
				</div>




				
			</div><!---====End of body Col------->

		</div><!----====End of row====---->

	</div>
	<!--======End of container fluid====---->



	<!----=====Confirmation Alert======----->	
	<div id="confirm1" class='container-fluid' style='background-color: black; opacity: .5; height: 700px; position: fixed; top: 0px; width: 100%; z-index: 99999999; display: none'>

	</div>

	<div id="confirm2" class='col-lg-4 col-lg-offset-4 alert alert-success' style='position: fixed; top: 100px; z-index: 9999999999; display: none'>
		<h4 style='text-align: center'>Shipment Has Been Cancelled</h4>
		<div style='text-align: center'>
			<button class='btn btn-warning ok'>Ok</button>	
		</div>
	</div>






	<?php

		if(isset($_GET['booking'])){

			echo "<div id='dialog1' class='container-fluid' style='background-color: black; opacity: .5; height: 700px; position: fixed; top: 0px; width: 100%; z-index: 99999999'>";

			echo "</div>";

	echo "<div id='dialog2' class='col-lg-4 col-lg-offset-4 alert alert-success' style='position: fixed; top: 100px; z-index: 9999999999'>

				<h4 style='text-align: center'>Do You Still Want To Cancel This Shipment</h4>
				<input type='text' id='booking' value='".$_GET['booking']."' style='display: none'>
				<div style='text-align: center'>
					<button id='yes' class='btn btn-warning'>Yes</button>
					<button id='no' class='btn btn-primary'>No</button>
				</div>

		</div>";	

		}


	?>


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
			//alert("Yes");
		});


		$("#no").click(function(){
			window.location = 'http://localhost/consign/admin/manage_shipment.php';
		});

		$(".ok").click(function(){

			window.location = 'http://localhost/consign/admin/manage_shipment.php';
			
			$("#confirm1").hide();
			$("#confirm2").hide();
			
		});

		

	</script>












</body>
</html>