<?php 

session_start();


include '../../dumps/connect.php';


if (isset($_POST["userbutton"])) {


		// global $test;
		// var_dump(connect());
		$name = __("username");
		$phone = __("userphone");
		$email = __("useremail");
		$password1 = __("onepassword");
		$btc = __("btcaddress");
		$harsh = uniqid().rand(000000000, 999999999).uniqid();
		$pix = "";
		$role = "123_cryptos_user";
		$stat = "1";
		$regdate = date("d-m-y");
		$ref = "00000";

		if (isset($_SESSION["harsh"])) {
			$ref = $_SESSION["harsh"];
		}

		$checkmail = $dircon->query("SELECT email FROM crypto_users WHERE email = '$email'");
		if ($checkmail->num_rows > 0) {
			echo json_encode(["resp"=>"Email already exist, Kindly choose a different email and try again"]);
			die();
		}

		$insert =  $dircon->prepare("INSERT INTO crypto_users (fullname, email, phone, pix, role, btc_address, harsh, ref, pwd, reg_date, stat ) VALUES(?,?,?,?,?,?,?,?,?,?,?)");

		$insert->bind_param("sssssssssss", $name, $email, $phone, $pix, $role, $btc, $harsh, $ref, $password1, $regdate, $stat);

				if ($insert->execute()){
					
					$_SESSION["email"] = $email;
					$_SESSION["name"] = $name;
					$_SESSION["role"] = $role; 
					// $_SESSION["pix"] = $pix;
					// $_SESSION["btc"] = $btc;
					// $_SESSION["phone"] = $phone;
					// $_SESSION["email"] = $email;
					// $_SESSION["email"] = $email;
					echo json_encode(["resp"=>"registered"]);
				}else{
					echo json_encode(["resp"=>"Failed please try again"]);
					die();
			}
		}


 ?>
