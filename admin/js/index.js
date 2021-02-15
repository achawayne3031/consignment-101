	



	$(document).ready(function(){

			var date = new Date();
			var date1 = date.toLocaleDateString();


					var time = new Date();
					var time1 = time.toLocaleTimeString();
					$("#time").html(time1);

				setInterval(function(){
					var time = new Date();
					var time1 = time.toLocaleTimeString();
					$("#time").html(time1);
				}, 1000);
			
			
			

			$("#date").html(date1);
		})
		
