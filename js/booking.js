



$(document).ready(function(){


	/*===========State of Origin=======*/

	$("#origin2").click(function(){
		$("#origin1").val('abuja');
	});

	$("#origin3").click(function(){
		$("#origin1").val('lagos');
	});

	$("#origin4").click(function(){
		$("#origin1").val('enugu');
	});

	$("#origin5").click(function(){
		$("#origin1").val('imo');
	});

	/*=======End of origin======*/




	/*========Destination=======*/

	$("#destination2").click(function(){
		$("#destination1").val('abuja');
	});

	$("#destination3").click(function(){
		$("#destination1").val('lagos');
	});

	$("#destination4").click(function(){
		$("#destination1").val('enugu');
	});

	$("#destination5").click(function(){
		$("#destination1").val('imo');
	});
	/*========End of Destination=======*/




	/*========Service=======*/

	$("#service2").click(function(){
		$("#service1").val('express');
	});

	$("#service3").click(function(){
		$("#service1").val('normal');
	});
	/*========End of Service=======*/








	$("#book").click(function(){

		var origin = $("#origin1").val();
		var des = $("#destination1").val();
		var service = $("#service1").val();
		var height = $("#height").val();
		var weight = $("#weight").val();
		var length = $("#length").val();
		var width = $("#width").val();
		var name = $("#name").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var subject = $("#subject").val();

		var date = new Date();
		var date = date.toLocaleDateString();
	
		
		if(origin != ""){

			if(des != ""){

				if(service != ""){

					if(weight != ""){

						if(!(isNaN(weight)) == true){

							if(height != ""){

								if(!(isNaN(height)) == true){

									if(length != ""){

										if(!(isNaN(length)) == true){

											if(width != ""){

												if(!(isNaN(width)) == true){

													if(subject != ""){

														
														$.post('booking_process.php', {

															name: name,
															email: email,
															phone: phone,
															origin: origin,
															des: des,
															service: service,
															weight: weight,
															height: height,
															length: length,
															width: width,
															subject: subject,
															date: date

															}, function(data, status){

																if(data == 1){

																	//alert("done");

																	$("#main-body").hide();
																	$("#own-loader").show();
																	start();
																}


															});
														

														

														}else{

															alert("Enter the Subject name");
														}

													}else{

														alert("Enter Numbers only (0-9) on the width");
													}

												}else{

													alert("Enter the width");
												}

											}else{

												alert("Enter Numbers only (0-9) on the length");
											}

										}else{

											alert("Enter the length size");
										}

									}else{

										alert("Enter Numbers only (0-9) on the height")
									}

								}else{

									alert("Enter the height");
								}	

							}else{

								alert("Enter Numbers only (0-9) on the weight");
							}

						}else{

							alert("Enter the weight");
						}

					}else{

						alert("Select the Service");
					}

				}else{

					alert("Select the Destination");
				}

			}else{

				alert("Select the State of Origin");
			}





	});







	function start(){
		var begin = 10;
		var add = 0;
		var progress = $("#progress-bar").html();
		var start1 = setInterval(function(){
			
			var begin1 = --begin;

			add += 10;

			$("#progress-bar").css("width", + add + "%");
			//$("#progress-bar").html(add+ "%");
			$("#counter").html(begin1);

			if(begin == 0){
				clearInterval(start1);
				setTimeout(function(){
					window.location='http://localhost/consign/page/booking.php';
				}, 1000)
				
			}

		}, 1000);

	}







})