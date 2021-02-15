<?php
	
	require '../include/init.php';

	$conn = new Database;

	$query1 = $conn->query("SELECT * FROM shipment WHERE status ='unapproved'");
	$app = mysqli_num_rows($query1);


	$query2 = $conn->query("SELECT * FROM shipment WHERE status ='approved'");
	$unapp = mysqli_num_rows($query2);

	$user = $conn->query("SELECT * FROM users");
	$users = mysqli_num_rows($user);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript" src="js/index.js"></script>
	<style>
		
		body{
			background-color: rgb(255, 255, 218);
		}

		ul{
			list-style-type: none;
			padding: 0px;
			margin: 0px;
		}

		ul li{
			padding: 20px;
		}

		ul li:hover{
			background-color: rgb(255, 212, 255);
			cursor: pointer;
		}

		#sub-mini-menu li{
			padding: 5px;
		}

	</style>
</head>
<body>


	<div class="col-lg-2 admin-side-menu-bar">

				<div class="col-lg-12" style="padding-top: 10px">	
					<div class="form-group">
						<div class="col-lg-10 menu-form">
							<input type="text" disabled name="" class="form-control">
						</div>

						<div class="col-lg-2 menu-form">
							<button class="btn btn-default">Go</button>
						</div>
					
					</div>
				</div>

				<ul class="admin-menu-ul">
					<a href="http://localhost/consign/admin/dashboard.php" class="side-menu-li-link"><li><span></span>Dashboard</li></a>
						<li id="manage">Manage Shipment <span class="glyphicon glyphicon-triangle-bottom" style="padding-left: 30px"></span></li>
						<ul id="sub-mini-menu">
							<!-- <a href="http://localhost/consign/admin/manage_shipment.php" style="color: black; text-decoration: none"><li>Management details</li></a> -->
							<a href="http://localhost/consign/admin/unapproved.php" class="side-menu-li-link"><li>Unapproved Shipment <span class="badge"><?php echo $app; ?></span></li></a>
							<a href="http://localhost/consign/admin/approved.php" class="side-menu-li-link"><li>Approved Shipment <span class="badge"><?php echo $unapp; ?></span></li></a>
						</ul>
						
					<a href="http://localhost/consign/admin/users.php" class="side-menu-li-link"><li>Manage Users <span class="badge"><?php echo $users; ?></span></li></a>
					<a href="http://localhost/consign/admin/logout.php" class="side-menu-li-link"><li>Sign Out</li></a>
				</ul>
				
			</div>



<script>
	$(document).ready(function(){
		$("#manage").click(function(){
			$("#sub-mini-menu").slideToggle();
		});

	})
	
</script>



</body>
</html>