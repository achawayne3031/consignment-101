
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!--========Sub Header=====---->
		<div class="row" id="sub-header-row">
			<div class="col-lg-2 col-md-2"></div>
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 sub-header-col">	
				<h5 id="info-text"><span class="glyphicon glyphicon-envelope info-icon-envelope"></span>infocargo@gmail.com<span class="glyphicon glyphicon-phone info-icon-phone"></span>0901xxxxxxxx, 0812xxxxxxxx</h5>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<ul id="ul-social-media-icon">
					<li class="sub-header-links"><span class="fa fa-facebook social-icons"></span></li>
					<li class="sub-header-links"><span class="fa fa-google-plus social-icons"></span></li>
					<li class="sub-header-links"><span class="fa fa-instagram social-icons"></span></li>
					<li class="sub-header-links"><span class="fa fa-twitter social-icons"></span></li>
				</ul>
			</div>
		</div>
		<!----======End of first row=======------->


		<!----=======Main Menu=======----->
		<div class="row">
			<div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 header-second-row-col">	
				<div class="col-lg-1 col-md-1 col-xs-3 col-sm-3 main-menu-col">
					<a href="http://localhost/consign/index.php" class='lg-link-header-a'><h4><span class="fa fa-truck"></span> Cargo</h4></a>
				</div>


				<!----========Sm Menu==========------->
				<div class="col-xs-1 col-xs-offset-6 col-sm-1 col-sm-offset-6 visible-xs visible-sm" style="padding-top: 3px">	
					<button id="sm-menu-trigger" class="btn btn-default"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
				</div>

				<div id="menu-list-con" class="col-sm-8 col-sm-offset-4 col-xs-8 col-xs-offset-4">
					<ul class="default-ul">
						<?php
							if(isset($_SESSION['user_id'])){
								echo "
								<li class='list-menu' id='dashboard-link'>Dashboard</li>
								<li class='list-menu' id='my-shippment'>My Shippment</li>
								<li class='list-menu' id='book-shipping'>Book Shipping</li>
								<li class='list-menu' id='track-my-order'>Track My Orders</li>
								<li class='list-menu' id='print-invoice'>Print Invoice</li>
								<li class='list-menu' id='logout'>Log Out</li>
								";
								
							}else{
							echo "

								<li class='list-menu' id='home-link'><span class='fa fa-home'></span> Home</li>
								<li class='list-menu' id='booking-link'>Booking System</li>
								<li class='list-menu' id='track-link'>Track Orders</li>
								<li class='list-menu' id='login-link'><span class='fa fa-user'></span> Login</li>
								";
							}
							?>
						
					</ul>

				</div>








				<!---==================Lg Menu===================--->
				<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 visible-lg visible-md">
						<ul id="header-ul">
							<a href="http://localhost/consign/index.php"><li class="lg-header-links">Home</li></a>
							<a href="http://localhost/consign/page/booking.php" class="lg-link-menu"><li class="lg-header-links">Booking</li></a>
							<a href="http://localhost/consign/page/track_order.php" class="lg-link-menu"><li class="lg-header-links">Track Orders</li></a>
							<?php
							if(isset($_SESSION['user_id'])){
								echo "<a href ='http://localhost/consign/page/cdashboard.php' class='lg-link-header-a'><li class='lg-header-links'><span class='fa fa-user'></span> Account</li></a>";
							}else{
								echo "<a href='http://localhost/consign/page/login.php' class='lg-link-header-a'><li class='lg-header-links'><span class='fa fa-user'></span> Login</li></a>";
							}
							?>
						</ul>
				</div>

			</div>	
		</div><!--======End of Main menu =======----->

		

		<script type="text/javascript">

			$(document).ready(function(){

				$("#sm-menu-trigger").click(function(){
					$("#menu-list-con").slideToggle();
				});


				$("#home-link").click(function(){
					window.location = "http://localhost/consign/index.php";
				});

				$("#login-link").click(function(){
					window.location = "http://localhost/consign/page/login.php";
				});


				$("#account-link").click(function(){
					window.location = "http://localhost/consign/page/cdashboard.php";
				});


				$("#track-link").click(function(){
					window.location = "http://localhost/consign/page/track_order.php";
				});


				$("#booking-link").click(function(){
					window.location = "http://localhost/consign/page/booking.php";
				});


				$("#dashboard-link").click(function(){
					window.location = "http://localhost/consign/page/cdashboard.php";
				});

				$("#book-shipping").click(function(){
					window.location = "http://localhost/consign/page/booking.php";
				});


				$("#track-my-order").click(function(){
					window.location = "http://localhost/consign/page/track.php";
				});


				$("#logout").click(function(){
					window.location = "http://localhost/consign/page/logout.php";
				});






			})
			




		</script>



</body>
</html>