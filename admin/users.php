

<?php

	require('../include/init.php');

		if(!(isset($_SESSION['admin']))){
			redirect('index.php');
		}
		$conn = new Database;
		$query2 = $conn->query("SELECT * FROM users");
		$num2 = mysqli_num_rows($query2);
		$num22 = $num2;

		$output2 = "";
		if($num2 != 0){
			$count = 0;
				while($row2 = mysqli_fetch_array($query2)){
					$count += 1;
				$date = $row2['date_of_reg'];
				$first = $row2['first_name'];
				$last = $row2['last_name'];
				$email = $row2['email'];
				$phone = $row2['phone'];
				
				$output2 .= "<tr>";
				$output2 .= "<td>$count</td>";
				$output2 .= "<td>$date</td>";
				$output2 .= "<td>$first $last</td>";
				$output2 .= "<td>$email</td>";
				$output2 .= "<td>$phone</td>";
				$output2 .= "</tr>";
			}



		}else{

			$output2 .= "<tr>";
			$output2 .= "<td colspan='4' style='text-align: center'>Shpiment list is empty</td>";
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
					<h5><span style="color: blue">Admin Dashboard</span> \  <span>Registered Users</span></h5>
				</div>


				<div class="col-lg-12 admin-body-content">
					<h3 style="text-align: center;">Registered Users</h3>
					<h4><?php echo $num22; ?> No. of Registered Users</h4>

					<hr>
					<table class="table table-bordered">
						<tr>
							<th>S/N</th>
							<th>Date of Registration</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Phone Number</th>
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