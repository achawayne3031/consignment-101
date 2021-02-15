
<?php

require_once '../include/init.php';

	if(!isset($_SESSION['user_id'])){
		redirect('login.php');
	}

	

	$user_details = Consignment::get_all_details_by_user_id($_SESSION['user_id']);
	$name = $user_details['first_name'] . " " . $user_details['last_name'];
	$email = $user_details['email'];
	$phone = $user_details['phone'];

	$data = [
		'origin' => '',
		'destination' => '',
		'service' => '',
		'weight' => '',
		'height' => '',
		'length' => '',
		'width' => '',
		'name' => '',
		'email' => '',
		'phone' => '',
		'subject' => '',
		'origin_err' => '',
		'destination_err' => '',
		'service_err' => '',
		'weight_err' => '',
		'height_err' => '',
		'length_err' => '',
		'width_err' => '',
		'name_err' => '',
		'email_err' => '',
		'phone_err' => '',
		'subject_err' => '',
	];


	if(isset($_POST['submit'])){

		  //////// Sanitize the POST
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


		$data = [
			'origin' => trim($_POST['origin']),
			'destination' => trim($_POST['destination']),
			'service' => trim($_POST['service']),
			'weight' => trim($_POST['weight']),
			'height' => trim($_POST['height']),
			'length' => trim($_POST['length']),
			'width' => trim($_POST['width']),
			'name' => trim($_POST['name']),
			'email' => trim($_POST['email']),
			'phone' => trim($_POST['phone']),
			'subject' => trim($_POST['subject']),
			'origin_err' => '',
			'destination_err' => '',
			'service_err' => '',
			'weight_err' => '',
			'height_err' => '',
			'length_err' => '',
			'width_err' => '',
			'subject_err' => '',
		];

		if(empty($_POST['origin'])){
			$data['origin_err'] = 'Select the origin';
		}

		if(empty($_POST['destination'])){
			$data['destination_err'] = 'Select the destination';
		}

		if(empty($_POST['service'])){
			$data['service_err'] = 'Select the service type';
		}

		if(empty($_POST['weight'])){
			$data['weight_err'] = 'Enter the weight';
		}

		if(empty($_POST['height'])){
			$data['height_err'] = 'Enter the height';
		}
	
		if(empty($_POST['length'])){
			$data['length_err'] = 'Enter the length';
		}

		if(empty($_POST['width'])){
			$data['width_err'] = 'Enter the width';
		}

		if(empty($_POST['subject'])){
			$data['subject_err'] = 'Enter the subject';
		}


		if(empty($data['origin_err']) 
		&& empty($data['destination_err']) 
		&& empty($data['service_err']) 
		&& empty($data['weight_err'])
		&& empty($data['height_err'])
		&& empty($data['length_err'])
		&& empty($data['width_err'])
		&& empty($data['subject_err'])){

			$result = Consignment::store_booking($data);
			if($result['success']){
				$msg = "Your shipping has been entered, your booking number is <b>" . $result['booking'] . "</b>";
			}else{
				$msg = "Something went wrong, Try again";
			}

		}

	

	}


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
	<script  type="text/javascript" src="../js/booking.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/index-media.css">
	<link rel="stylesheet" type="text/css" href="../css/booking-media.css">
</head>
<body>

	<div class="container-fluid">
		<?php include('../template/header.php'); ?>

		<div id="main-body" class="row" style="margin-top: 30px;">

			<div class="col-lg-2 col-md-2 visible-lg visible-md user-dashboard-side-bar">
				<ul id="ul-side-bar">
					<li id="user-icon-con"><span class="fa fa-user user-icon"></span></li>
					<a href="http://localhost/consign/page/booking.php" class="side-bar-links"><li class="side-bar-item"><span class="fa fa-plane"></span> Book Shipping</li></a>
					<!-- <li><span class="fa fa-plane"></span> My Shipments</li>
					<li><span class="fa fa-dashboard"></span> Print Invoice</li> -->
					<a href="cdashboard.php?logout=true" class="side-bar-links"><li class="side-bar-item"><span class="fa fa-sign-out"></span> Sign Out</li></a>
				</ul>
			</div>



			<div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2" style="border-radius: 5px; padding-bottom: 20px">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3 style="text-align: center; font-weight: bolder;">Booking System</h3>
					<?php
                        if(isset($msg)){
                            echo "<div class='alert alert-success'>
                                <h6 class='text-center alert-text'>" .$msg. "</h6>
                            </div>";
                        }
                    ?>
					<hr>
				</div>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<!--========Section 1======----->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md" style="padding-bottom: 20px; padding-right: 0px; padding-left: 0px">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="form-group" style="border: 1px groove lightblue; padding: 10px; border-radius: 5px">
							<h4 style="text-align: center;">State of Origin <button class="btn btn-default" disabled><span class="fa fa-map-marker"></span></button></h4>
							<select class="form-control" name="origin" required>
								<option id="origin1" value="">Select the state of origin</option>
								<option id="origin2" value="abuja">Abuja</option>
								<option id="origin3" value="lagos">Lagos</option>
								<option id="origin4" value="enugu">Enugu</option>
								<option id="origin5" value="imo">Imo</option>	
							</select>
							<span class="booking-alert"><?php echo $data['origin_err']; ?></span>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="form-group" style="border: 1px groove lightblue; padding: 10px; border-radius: 5px">
							<h4 style="text-align: center;">Destination <button class="btn btn-default" disabled><span class="fa fa-map-marker"></span></button></h4>
							<select class="form-control" name="destination" required>
								<option id="destination1" value="">Select the destination</option>
								<option id="destination2" value="abuja">Abuja</option>
								<option id="destination3" value="lagos">Lagos</option>
								<option id="destination4" value="enugu">Enugu</option>
								<option id="destination5" value="imo">Imo</option>
							</select>
							<span class="booking-alert"><?php echo $data['destination_err']; ?></span>

						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="form-group" style="border: 1px groove lightblue; padding: 10px; border-radius: 5px">
							<h4 style="text-align: center;">Service <button class="btn btn-default" disabled><span class="fa fa-cog"></span></button></h4>
							<select class="form-control" name="service" required>
								<option id="service1" value="">Select the service type</option>
								<option id="service2" value="express">Express</option>
								<option id="service3" value="normal">Normal</option>
								<option id="service3" value="normal">Standard</option>

							</select>
							<span class="booking-alert"><?php echo $data['service_err']; ?></span>
						</div>
					</div>
			</div>
			<!--========End of Section 1======----->

			<!--========Section 2======----->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px; margin-bottom: 20px">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom: 10px">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 0px">
						<button class="btn btn-default book-state-option" style="" disabled>Weight</button>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding: 0px; margin-left: -10px">
						<input type="number" required name="weight" class="form-control book-state-option" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px" id="weight">
					</div>
					<span class="booking-alert"><?php echo $data['weight_err']; ?></span>

				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom: 10px">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 0px">
						<button class="btn btn-default book-state-option" style="" disabled>Height</button>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding: 0px; margin-left: -10px">
						<input type="number" required name="height" class="form-control book-state-option" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px" id="height">
					</div>
					<span class="booking-alert"><?php echo $data['height_err']; ?></span>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom: 10px">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 0px">
						<button class="btn btn-default book-state-option" style="" disabled>Length</button>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding: 0px; margin-left: -10px">
						<input type="number" required name="length" class="form-control book-state-option" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px" id="length">
					</div>
					<span class="booking-alert"><?php echo $data['length_err']; ?></span>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom: 10px">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 0px">
						<button class="btn btn-default book-state-option" style="" disabled>Width</button>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding: 0px; margin-left: -17px">
						<input type="number" required name="width" class="form-control book-state-option" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px" id="width">
					</div>
					<span class="booking-alert"><?php echo $data['width_err']; ?></span>
				</div>
			</div>
		<!--========End of Section 2======----->




		<!--========Section3======----->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px; margin-bottom: 20px">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<h4 class="book-state">Name</h4>
					<input type="text" class="form-control book-state-option" placeholder="Full name" value="<?php echo $name; ?>" id="name" disabled>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<h4 class="book-state">Email</h4>
					<input type="text" class="form-control book-state-option" placeholder="Email Address" value="<?php echo $email; ?>" id="email" disabled>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<h4 class="book-state">Phone</h4>
					<input type="text" class="form-control book-state-option" placeholder="Phone number" value="<?php echo $phone; ?>" id="phone" disabled>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<h4 class="book-state">Subject</h4>
					<input type="text" name="subject" required class="form-control book-state-option" placeholder="Subject" id="subject">
					<span class="booking-alert"><?php echo $data['subject_err']; ?></span>

				</div>
				<input type="text" name="name" value="<?php echo $name; ?>" hidden>
				<input type="text" name="email" value="<?php echo $email; ?>" hidden>
				<input type="text" name="phone" value="<?php echo $phone; ?>" hidden>


			</div>
			<!--========End of Section 3======----->


			<!--========Section 4======----->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<input type="submit" name="submit" value="Book Now" class="btn btn-success">
				<!-- <button class="btn btn-success book-state" id="book">Book Now</button> -->
			</div>
			<!--========End of Section 4======----->
			</form>


			</div>	
		</div><!-----End of row=======---->






		<div id="own-loader" class="row" style="margin-top: 30px; display: none">

			<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="background-color: white; border-radius: 5px; padding-bottom: 20px">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3 style="text-align: center; font-weight: bolder;">Booking status</h3>
					<hr>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
					<div class="progress">
  						<div id="progress-bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="">
  						</div>
					</div>

					<h4 style="text-align: center">Your Booking was Successful</h4>
					<h4 id="counter">10</h4>
					<h4>Page will refresh in next 10seconds</h4>
					<button class="btn btn-success" onclick="window.location='http://localhost/consign/page/booking.php'">Refresh</button>
				</div>



			</div>
		</div>









</div><!-----======End of container-fluid====---->




</body>
</html>