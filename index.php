<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Cargo - Homepage</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/index-media.css">
	<script src="js/index.js"></script>
</head>
<body>
	<div class="container-fluid">
		<?php include("template/header.php"); ?>
		
		<!---=======Slider Row======----->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xl-12" id="slider-container">
       			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

         			<!-- Indicators----->
         			<ol class="carousel-indicators">
            			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
           				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
          			</ol>
          

            		<!-- Wrapper for slides -->
          		<div class="carousel-inner" role="listbox">
				  
				  	<div class="item">
           				<img src="img/874848489.png" alt="..." class="img-responsive img-slider" style="">
              			<!-- <div class="carousel-caption">
                			<h4 class="animated bounceInDown delay-1s ani-text">dope work by usk22222</h4>
                			<button class="btn btn-success animated bounceInLeft delay-1s ani-btn">Shop now</button>
              			</div> -->
         			</div>


            		<div class="item active">
              			<img src="img/7848487847.jpg" alt="..." class="img-responsive img-slider" style="">
               			<!-- <div class="carousel-caption">
                  			<h4 class="animated bounceInRight slower ani-text">we give an amazing work11111</h4>
                  			<button class="btn btn-success animated bounceInLeft slow ani-btn">Shop now</button>
                		</div> -->
            		</div>

         			<div class="item">
            			<img src="img/7373773.png" alt="..." class="img-responsive img-slider" style="">
              			<!-- <div class="carousel-caption">
                			<h4 class="animated bounceInDown delay-1s ani-text">dope work by usk22222</h4>
                			<button class="btn btn-success animated bounceInLeft delay-1s ani-btn">Shop now</button>
              			</div> -->
         			 </div>


           			<div class="item">
           				<img src="img/87587587.jpg" alt="..." class="img-responsive img-slider" style="">
              			<!-- <div class="carousel-caption">
                			<h4 class="animated bounceInDown delay-1s ani-text">dope work by usk22222</h4>
                			<button class="btn btn-success animated bounceInLeft delay-1s ani-btn">Shop now</button>
              			</div> -->
         			</div>

       			</div>

  				<!-- Controls -->
      			<div class="me">
        			<!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        				<span class="sr-only">Previous</span>
        			</a> -->
        			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        				<span class="sr-only">Next</span>
        			</a>
     			</div>
  			</div>
		</div>	
	</div><!--------======End of slider row====------>



	<!---======SERVICE===== ------>
	<section id="service-calculator-section">
		<!-- <div class="row"> -->
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 service-col">
				<h3 id="title-header2">Basic Calculated Sample</h3>
				<hr>
				<div class="form-group">
					<h4 class="form-fill-title">Distance(KM)*</h4>
					<input type="number" id="distance" name="" class="form-control" onkeyup="callCal()">
					<span class="cal-alert" id="distance-alert"></span>
				</div>

				<div class="form-group">
					<h4 class="form-fill-title">Weight(kg)</h4>
					<input type="number" id="weight" name="" class="form-control" onkeyup="callCal()">
					<span class="cal-alert" id="weight-alert"></span>
				</div>

				<div class="form-group">
					<label class="form-fill-title cal-sub-text">Fragile</label>
					<label class="radio-inline fragile-radio"><input type="radio" value="yes" name="fragile" onclick="callCal()">Yes</label>
					<label class="radio-inline fragile-radio"><input type="radio" value="no" name="fragile" onclick="callCal()">No</label>
					<span class="cal-alert fra" id="fragile-alert"></span>
				</div>


				<div class="form-group">
					<label class="form-fill-title cal-sub-text">Extra Services:</label>
					<label class="radio-inline service-radio"><input type="radio" value="express" name="service" onclick="callCal()">Express</label>
					<label class="radio-inline service-radio"><input type="radio" value="normal" name="service" onclick="callCal()">Normal</label>
					<label class="radio-inline service-radio"><input type="radio" value="standard" name="service" onclick="callCal()">Standard</label>
					<span class="cal-alert fra" id="service-alert"></span>
				</div>
				<hr>
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
					<h4 class="form-fill-title">Total: $<span id="total"> 0</span></h4>
				</div>
			</div>
		<!-- </div> -->
	</section>
	
	
</div><!---=====End of Container Fluid========----->


</body>
</html>