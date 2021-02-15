

<?php

	$booking = trim($_POST['booking'], " ");
	$conn = mysqli_connect("localhost", "root", "", "consignment");
	$query = mysqli_query($conn, "SELECT * FROM shipment WHERE booking_no = '$booking'");
	$num = mysqli_num_rows($query);
		$output = "";

		if($num != 0){

			$output .= "<h4 id='booking-num' style='color: red; font-weight: bold; padding: 10px'>Booking No. $booking</h4>";

			while($row = mysqli_fetch_array($query)){

				$email = $row['email'];
				$full = $row['full_name'];
				$phone = $row['phone'];
				$from = $row['origin'];
				$to = $row['destination'];
				$service = $row['service'];
				$weight = $row['weight'];
				$height = $row['height'];
				$width = $row['width'];
				$length = $row['length'];
				$subject = $row['subject'];
				$status = $row['status'];
				$booking_date = $row['date_of_booking'];
				$delivery_date = $row['date_of_delivery'];

			}



///////////////////////Large Device//////////////////////////
			$output .= "<table class='table table-bordered table-condensed'>";

			$output .= "<tr>";
			$output .= "<th>Date Of Booking:</th>";
			$output .= "<td>$booking_date</td>";
			$output .= "<th>Date Of Delivery:</th>";

				if($status == 'approved'){
					$output .= "<td>$delivery_date</td>";
				}else{
					$output .= "<td>Have not yet been approved</td>";
				}

			

			$output .= "</tr>";

			$output .= "<tr>";
			$output .= "<th>Full Name:</th>";
			$output .= "<td>$full</td>";
			$output .= "<th>Email:</th>";
			$output .= "<td>$email</td>";
			$output .= "</tr>";


			$output .= "<tr>";
			$output .= "<th>From:</th>";
			$output .= "<td>$from</td>";
			$output .= "<th>To:</th>";
			$output .= "<td>$to</td>";
			$output .= "</tr>";


			$output .= "<tr>";
			$output .= "<th>Phone Number:</th>";
			$output .= "<td>$phone</td>";
			$output .= "<th>Service Type:</th>";
			$output .= "<td>$service</td>";
			$output .= "</tr>";



			$output .= "<tr>";
			$output .= "<th>Weight:</th>";
			$output .= "<td>$weight</td>";
			$output .= "<th>Height:</th>";
			$output .= "<td>$height</td>";
			$output .= "</tr>";


			$output .= "<tr>";
			$output .= "<th>Length:</th>";
			$output .= "<td>$length</td>";
			$output .= "<th>Width:</th>";
			$output .= "<td>$width</td>";
			$output .= "</tr>";


			$output .= "<tr>";
			$output .= "<th>Subject:</th>";
			$output .= "<td>$subject</td>";
			$output .= "<th>Status:</th>";
			$output .= "<td><span style='background-color: red; color: white; font-weight: bold; padding: 5px; border-radius: 5px'>$status</span></td>";
			$output .= "</tr>";

			$output .= "</table>";

///////////////////Large Device/////////////////////////////










/*=========================Small Device==================

			$output .= "<table class='table table-bordered table-condensed visible-sm visible-xs'>";

			$output .= "<tr>";
			$output .= "<th>Date Of Booking:</th>";
			$output .= "<td>$booking_date</td>";
			$output .= "<th>Date Of Delivery:</th>";

				if($status == 'approved'){
					$output .= "<td>$delivery_date</td>";
				}else{
					$output .= "<td>Have not yet been approved</td>";
				}

			

			$output .= "</tr>";

			$output .= "<tr>";
			$output .= "<th>Full Name:</th>";
			$output .= "<td>$full</td>";
			$output .= "<th>Email:</th>";
			$output .= "<td>$email</td>";
			$output .= "</tr>";


			$output .= "<tr>";
			$output .= "<th>From:</th>";
			$output .= "<td>$from</td>";
			$output .= "<th>To:</th>";
			$output .= "<td>$to</td>";
			$output .= "</tr>";


			$output .= "<tr>";
			$output .= "<th>Phone Number:</th>";
			$output .= "<td>$phone</td>";
			$output .= "<th>Service Type:</th>";
			$output .= "<td>$service</td>";
			$output .= "</tr>";



			$output .= "<tr>";
			$output .= "<th>Weight:</th>";
			$output .= "<td>$weight</td>";
			$output .= "<th>Height:</th>";
			$output .= "<td>$height</td>";
			$output .= "</tr>";


			$output .= "<tr>";
			$output .= "<th>Length:</th>";
			$output .= "<td>$length</td>";
			$output .= "<th>Width:</th>";
			$output .= "<td>$width</td>";
			$output .= "</tr>";


			$output .= "<tr>";
			$output .= "<th>Subject:</th>";
			$output .= "<td>$subject</td>";
			$output .= "<th>Status:</th>";
			$output .= "<td><span style='background-color: red; color: white; font-weight: bold; padding: 5px; border-radius: 5px'>$status</span></td>";
			$output .= "</tr>";

			$output .= "</table>";

			======================End of Small Device==================*/


		}else{

	$output .= "<div class='alert alert-success'>
  					<h4 style='text-align: center'>Booking Number dosen't exits</h4>
				</div>";
		}


		echo $output;





?>