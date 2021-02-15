
<?php

	require_once '../include/init.php';

	$data = [
		'email' => '',
		'password' => '',
		'email_err' => '',
		'password_err' => ''

	];

	if(isset($_POST['submit'])){

		 //////// Sanitize the POST
		 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$data = [
			'email' => trim($_POST['email']),
			'password' => trim($_POST['password']),
			'email_err' => '',
			'password_err' => ''
		];

		if(empty($_POST['email'])){
			$data['email_err'] = 'Enter your email';
		}

		if(empty($_POST['password'])){
			$data['password_err'] = 'Enter your passowrd';
		}

		if(empty($data['email_err']) && empty($data['password_err'])){
	
			$res = new Consignment;
			$res = $res->verify_user($data);
            if(empty($res)){
                $msg = "Invalid credential";
            }else{
                $hashed_password = $res['password'];
                if(password_verify($data['password'], $hashed_password)){
                    Session::login_user($res);
                }else{
					$msg = "Invalid credential";
				}
            }




		} 

	}




	




?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/index-media.css">
	<link rel="stylesheet" type="text/css" href="../css/login-media.css">
</head>
<body>
	<div class="container-fluid">
		<?php include('../template/header.php'); ?>
		<div class="row login-row">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-xs-12 col-sm-12 user-form-col">
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
					<h3 id="title-header2">Login</h3>
					<hr>
					<?php if(!empty($msg)){
					echo '<div class="alert alert-success text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							'.	$msg . '
				  		</div>';
					} ?>
				</div>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<div class="form-group">
						<h4 class="form-fill-title">Email</h4>
						<input type="text" name="email" placeholder="Email" required class="form-control" value="<?php echo $data['email']; ?>">
						<span class="is-invalid"><?php echo $data['email_err']; ?></span>
					</div>

					<div class="form-group">
						<h4 class="form-fill-title">Password</h4>
						<input id="password" type="password" required name="password" placeholder="Password" class="form-control" value="<?php echo $data['password']; ?>">
						<!-- <span id="eye" class="fa fa-eye-slash" style=""></span> -->
						<span class="is-invalid"><?php echo $data['password_err']; ?></span>
					</div>

					<div class="form-group">
						<label class="checkbox-inline form-fill-title"><input type="checkbox" value="">Remember me</label>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-default" value="Login">
						<button class="btn btn-primary read-more" onclick="window.location='http://localhost/consign/page/register.php'">Register</button>
					</div>
				</form>
			</div>
			</div>	
		</div>

</div><!---=====End of container-fluid====---->

</body>
</html>