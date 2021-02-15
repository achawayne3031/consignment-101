

<?php


    
		function validate($data){
			if(empty($data['fname'])){
				$data['fname_err'] = 'Enter your first name';
			}

			if(empty($data['lname'])){
				$data['lname_err'] = 'Enter your last name';
			}

			if(empty($data['email'])){
				$data['email_err'] = 'Enter your email address';
			}

			if(empty($data['password'])){
				$data['password_err'] = 'Enter your password';
			}else{
				if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
					$data['email_err'] = "Invalid email address";
				  }
			}

			if(empty($data['phone'])){
				$data['phone_err'] = 'Enter your phone number';
			}
			return $data;
		}


		
		function redirect($path){
			header("location: " . $path);
		}
