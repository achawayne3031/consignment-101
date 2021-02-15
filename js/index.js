
$(document).ready(function(){


	$("#owl-demo").owlCarousel({
   		items : 1,
    	lazyLoad : true,
    	slideSpeed : 300,
    	autoPlay: 3000
  	}); 

	
		
	  

	  $("#login").click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
		if(email != ""){
			if(password != ""){
				$.post('login_process.php', {email: email, password: password}, function(data, status){
					if(data == 0){
						alert("Email address not registered");
					}
					if(data == 11){
						alert("password not correct");
					}

					if(data == 1){
						window.location ='http://localhost/consign/index.php';
					}
				});
			}else{
				alert("Enter your password");
			}
		}else{
			alert("Enter your Email");
		}
	});


	$("#eye").on('click', function(){
		var password = $("#password");
		var passAttr = password.attr('type');

		var eye = $("#eye");
		var eyeAttr = eye.attr('class');

		if(eyeAttr == 'fa fa-eye-slash'){
			eye.attr('class', 'fa fa-eye');
		}else{
			eye.attr('class', 'fa fa-eye-slash');
		}

		if(passAttr == 'password'){
			password.attr('type', 'text');
		}else{
			password.attr('type', 'password');
		}
	});





})



function getDistance(){
	var start = setInterval(function(){
		var distance = $("#distance").val();
		if(distance != ""){
			clearInterval(start);
			$("#distance-alert").html("");
		}else{
			distance = 0;
			$("#distance").val('');
			$("#distance-alert").html("Only numbers are allowed (0-9) ");
		}
		//console.log(distance);
	}, 1000);


}


 function getWeight(){
	var start = setInterval(function(){
		var weight = $("#weight").val();
		if(weight != ""){
			clearInterval(start);
			$("#weight-alert").html("");
		}else{
			weight = 0;
			$("#weight").val('');
			$("#weight-alert").html("Only numbers are allowed (0-9) ");
		}

	}, 1000);

 }


 function getFragile(){
	var start = setInterval(function(){
		var fragile = $("input[type='radio'][name='fragile']:checked").val();
		if(fragile != undefined){
			clearInterval(start);
			$("#fragile-alert").html("");
		}else{
			$("#fragile-alert").html("select the fragile properties");
		}

	}, 1000);
 }



 function getService(){
	var start = setInterval(function(){
		var service = $("input[type='radio'][name='service']:checked").val();

		if(service != undefined){
			clearInterval(start);
			$("#service-alert").html("");
		}else{
			$("#service-alert").html("select the service type");
		}

	}, 1000);

 }


function callCal(){

	getWeight();
	getDistance();
	getFragile();
	getService();

		var total;
		var fragileAmountOn = 1000;
		var express = 5000;
		var normal = 500;
		var standard = 2000;
		var distanceAmount;
		var weightAmount;

		

		var distance = $("#distance").val();
		var weight = $("#weight").val();
		var fragile = $("input[type='radio'][name='fragile']:checked").val();
		var service = $("input[type='radio'][name='service']:checked").val();

		if(distance == ""){
			distanceAmount = 0;
		}

		if(distance <= 50 && distance > 0){
			distanceAmount = 500;
		}else if(distance <= 100 && distance > 50){
			distanceAmount = 1500;
		}else if(distance <= 150 && distance > 100){
			distanceAmount = 2000;
		}else if(distance <= 200 && distance > 150){
			distanceAmount = 2500;
		}else if(distance <= 250 && distance > 200){
			distanceAmount = 3000;
		}else if(distance <= 300 && distance > 250){
			distanceAmount = 3500;
		}else if(distance <= 350 && distance > 300){
			distanceAmount = 4000;
		}else if(distance <= 400 && distance > 350){
			distanceAmount = 4500;
		}else if(distance <= 450 && distance > 400){
			distanceAmount = 5000;
		}else if(distance <= 500 && distance > 450){
			distanceAmount = 5500;
		}else{
			distanceAmount = 10000;
		}
		
		

		
		if(weight < 50 && weight > 0){
			weightAmount = 2500;
		}else if(weight <= 100 && weight > 50){
			weightAmount = 5000;
		}else if(weight <= 150 && weight > 100){
			weightAmount = 7500;
		}else if(weight <= 200 && weight > 150){
			weightAmount = 10000;
		}else if(weight <= 250 && weight > 200){
			weightAmount = 12500;
		}else if(weight <= 300 && weight > 250){
			weightAmount = 15000;
		}else if(weight <= 350 && weight > 300){
			weightAmount = 17500;
		}else if(weight <= 400 && weight > 350){
			weightAmount = 20000;
		}else if(weight <= 450 && weight > 400){
			weightAmount = 22500;
		}else if(weight <= 500 && weight > 450){
			weightAmount = 25000;
		}else{
			weightAmount = 50000;
		}

		if(weight == ""){
			weightAmount = 0;
		}



		if(fragile == undefined || fragile == 'no'){
			fragileAmountOn = 0;
		}

		if(service == undefined){
			service = 0;
		}else{
			if(service == 'express'){
				service = express;
			}

			if(service == 'standard'){
				service = standard;
			}

			if(service == 'normal'){
				service = normal;
			}
		}
		

	total = fragileAmountOn + service + distanceAmount + weightAmount;
	$("#total").html(total);

	
	


	
}