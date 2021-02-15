<?php

require_once '../include/init.php';

$data = [
	'username' => '',
	'password' => '',
	'username_err' => '',
	'password_err' => ''

];

if(isset($_POST['submit'])){

	 //////// Sanitize the POST
	 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	$data = [
		'username' => trim($_POST['username']),
		'password' => trim($_POST['password']),
		'username_err' => '',
		'password_err' => ''
	];

	if(empty($_POST['username'])){
		$data['username_err'] = 'Enter your username';
	}

	if(empty($_POST['password'])){
		$data['password_err'] = 'Enter your passowrd';
	}

	//$data = validate($data);

	if(empty($data['username_err']) && empty($data['password_err'])){
		if($data['username'] == 'achawayne' && $data['password'] == '12345'){
			Session::admin_login($data);
		}else{
			$msg = "Invalid credential";
		}
		
	

	} 

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
	
</head>
<body>

	<div class="container-fluid">
		<div class="row" style="margin-top: 50px">
			<div class="col-lg-4 col-lg-offset-4" style="background-color: white; border-radius: 5px; border: 1px groove cyan">
				<div class="col-lg-12" style="text-align: center;">
					<h3>Admin Login</h3>
					<hr>
					<?php if(!empty($msg)){
					echo '<div class="alert alert-success text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
							'.	$msg . '
				  		</div>';
					} ?>
				</div>

				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form-group">
					<h4>Username</h4>
					<input type="text" required name="username" class="form-control" value="<?php echo $data['username']; ?>">	
					<span class="is-invalid"><?php echo $data['username_err']; ?></span>
				</div>

				<div class="form-group">
					<h4>Password</h4>
					<input type="password" required name="password" class="form-control" value="<?php echo $data['password']; ?>">
					<span class="is-invalid"><?php echo $data['password_err']; ?></span>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" value="Login" class="btn btn-success">
				</div>
				</form>
			</div>
		</div>
		
	</div>



	<script>

		$(document).ready(function(){

			$("#login").click(function(){

				var username = $("#username").val();
				var password = $("#password").val();

				if(username != ""){

					if(password != ""){

						$.post('login_process.php', {username: username, password: password}, function(data, status){

								if(data == 1){
									window.location = 'http://localhost/consign/admin/dashboard.php';
								}
						

						});

					}else{

						alert("Enter your password");
					}

				}else{

					alert("Enter your username");
				}

			});




		})
		



	</script>







</body>
</html>