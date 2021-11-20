<?php 

session_start();


include '../../dumps/connect.php';


if (isset($_POST["userbutton"])) {


		// global $test;
		// var_dump(connect());
		$name = __("username");
		$phone = __("userphone");
		$country = __("country");
		$email = __("useremail");
		$password1 = __("onepassword");
		$btc = __("btcaddress");
		$harsh = uniqid().rand(000000000, 999999999).uniqid();
		$pix = "";
		$role = "123_cryptos_user";
		$stat = "1";
		$regdate = date("d-m-y");
		$myReflink = __("myReflink") . sha1(rand());

	

		if (__("ref")) {
			$ref = __("ref");
		}else{
		$ref = "00000";
		}

		

		// if (isset($_SESSION["harsh"])) {
		// 	$ref = $_SESSION["harsh"];
		// }

		$checkmail = $dircon->query("SELECT email FROM crypto_users WHERE email = '$email'");
		if ($checkmail->num_rows > 0) {
			echo json_encode(["resp"=>"Email already exist, Kindly choose a different email and try again"]);
			die();
		}

		$insert =  $dircon->prepare("INSERT INTO crypto_users (fullname, email, phone, country, pix, role, btc_address, harsh, ref, pwd, reg_date, stat,myReflink ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

		$insert->bind_param("sssssssssssss", $name, $email, $phone, $country, $pix, $role, $btc, $harsh, $ref, $password1, $regdate, $stat,$myReflink);

				if ($insert->execute()){
					
					$_SESSION["email"] = $email;
					$_SESSION["name"] = $name;
					$_SESSION["role"] = $role; 
					// $_SESSION["pix"] = $pix;
					// $_SESSION["btc"] = $btc;
					// $_SESSION["phone"] = $phone;
					// $_SESSION["email"] = $email;
					// $_SESSION["email"] = $email;



					$to = $email;
					$subject = 'Welcome to our platform';
					$from = $email;

					
					// To send HTML mail, the Content-type header must be set
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				
					// Create email headers
					$headers .= 'From: '.$from."\r\n".
						'Reply-To: '.$from."\r\n" .
						'X-Mailer: PHP/' . phpversion();
					
					// Compose a simple HTML email message
					$message = '<html><body>';
					$message .= '<h1 style="color:#f40;">Hi ' .$name.'</h1>';
					$message .= '<p style="color:#080;font-size:18px;">Welcome to our platform</p>';
					$message .= '</body></html>';

					if(mail($to, $subject, $message, $headers))
					{
						// echo 'Your mail has been sent successfully.';
						echo json_encode(["resp"=>"registered"]);
					}
					else
					{
						// echo 'Unable to send email. Please try again.';
						echo json_encode(["resp"=>"Unable to send email. Please try again"]);
					}

					// echo json_encode(["resp"=>"registered"]);

					// echo json_encode(["resp"=>"registered"]);
				}else{
					echo json_encode(["resp"=>"Failed please try again"]);
					die();
			}
		}


 ?>
