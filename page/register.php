<?php

	require_once '../include/init.php';

	$data = [
		'fname' => '',
		'lname' => '',
		'email' => '',
		'password' => '',
		'phone' => '',
		'fname_err' => '',
		'lname_err' => '',
		'email_err' => '',
		'password_err' => '',
		'phone_err' => ''
	];

	$msg = '';

	if(isset($_POST['submit'])){

		 //////// Sanitize the POST
		 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$data = [
			'fname' => trim($_POST['fname']),
			'lname' => trim($_POST['lname']),
			'email' => trim($_POST['email']),
			'password' => trim($_POST['password']),
			'phone' => trim($_POST['phone']),
			'fname_err' => '',
			'lname_err' => '',
			'email_err' => '',
			'password_err' => '',
			'phone_err' => ''
		];

		///// Validate Data //////////
		$data = validate($data);

		if(empty($data['fname_err']) && empty($data['lname_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['phone_err'])){
			$verifyEmail = Consignment::verify_email($data['email']);
			if(empty($verifyEmail)){

				if(Consignment::RegisterUser($data)){
					$data = [
						'fname' => '',
						'lname' => '',
						'email' => '',
						'password' => '',
						'phone' => '',
						'fname_err' => '',
						'lname_err' => '',
						'email_err' => '',
						'password_err' => '',
						'phone_err' => ''
					];
					$msg = 'Registration was successful';

				}else{
					$msg = 'Something went wrong';
				}

			}else {
				$data['email_err'] = "Enter has already been registered";
			}
		}

	}

?>





<!DOCTYPE html>
<html>
<head>
	<title>User Register</title>
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/index-media.css">
	
</head>
<body>

	<div class="container-fluid">
		<?php include("../template/header.php"); ?>
		<div class="row" style="margin-top: 20px">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 user-form-col">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3 id="title-header2">Sign Up Here</h3>
					<span class="fa fa-refresh fa-spin reg-spin"></span>
					<hr>
					<?php if(!empty($msg)){
					echo '<div class="alert alert-success text-center col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-xs-6">
							'.	$msg . '
				  		</div>';
					} ?>
					
				</div>


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<h4 class="form-fill-title">First Name</h4>
								<input type="text" name="fname" class="form-control form-fill-text" id="fname" required placeholder="First Name" value="<?php echo $data['fname']; ?>">
								<span class="is-invalid"><?php echo $data['fname_err']; ?></span>
							</div>

							<div class="form-group">
								<h4 class="form-fill-title">Last Name</h4>
								<input type="text" name="lname" class="form-control form-fill-text" id="lname" required placeholder="last Name" value="<?php echo $data['lname']; ?>">
								<span class="is-invalid"><?php echo $data['lname_err']; ?></span>
							</div>

							<div class="form-group">
								<h4 class="form-fill-title">Phone Number</h4>
								<input type="number" name="phone" class="form-control form-fill-text" id="phone" required placeholder="Phone Number" value="<?php echo $data['phone']; ?>">
								<span class="is-invalid"><?php echo $data['phone_err']; ?></span>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<h4 class="form-fill-title">Email Address</h4>
								<input type="text" name="email" class="form-control form-fill-text" id="email" required placeholder="Email Address" value="<?php echo $data['email']; ?>">
								<span class="is-invalid"><?php echo $data['email_err']; ?></span>
							</div>

							<div class="form-group">
								<h4 class="form-fill-title">Password</h4>
								<input type="password" name="password" class="form-control form-fill-text" id="password" required placeholder="Password" value="<?php echo $data['password']; ?>">
								<span class="is-invalid"><?php echo $data['password_err']; ?></span>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="submit" name="submit" class="btn btn-primary read-more" value="Register">
						</div>
					</form>

				</div>
		
			</div>
		</div>
	</div>

</div><!---======End of container fluid=====----->

</body>
</html>