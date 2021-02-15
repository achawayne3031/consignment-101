
<?php
	require_once '../include/init.php';
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
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/index-media.css">
	<link rel="stylesheet" type="text/css" href="../css/track-media.css">
</head>
<body>
	<div class="container-fluid">
		<?php include("../template/header.php"); ?>
		<div class="row" id="track-order-row">
			<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset1 col-sm-12 col-xs-12 user-form-col">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3 id="track-title">Track Your Shipment</h3>
				</div>

				<div class="alert alert-success col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
  					<h5 id="track-instruct">Please enter your tracking number to search your order</h5>
				</div>

				<div class="form-group">

					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
							<input type="text" name="" placeholder="tracking no. eg: RCC2564674655" class="form-control" id="booking">
						</div>

						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<button class="btn btn-default" id="search"><span class="fa fa-search"></span></button>
						</div>
					</div>
				
				</div>
			</div>

		</div><!------====End of row====---->


		<div class="row">
			<div id="track-col-bg" class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="app">

					<div id="loader" class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
						<img src="../trans/loader.gif" class="img-responsive">
					</div>

				</div>
			</div>
		</div>

</div><!-----======End of container-fluid======---->




<script>
	$(document).ready(function(){
		$("#search").click(function(){
			var booking = $("#booking").val();
				if(booking != ""){
					$("#loader").show();
					$.post('track.php', {booking: booking}, function(data, status){
						$("#loader").hide(500);
						$("#app").delay(500).html(data);
					});
				}else{
					alert("Enter Your Booking No.");
				}
		});
	})
</script>







</body>
</html>