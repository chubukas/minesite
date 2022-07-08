<?php 
include '../../../../dumps/connect.php';

// echo $test;




session_start();



/**
 * 
 */
// class Profiledetails extends connection
// {
	
// 	function __construct()
// 	{
// 		$userid = $_SESSION["id"];
// 		$details = $this->connect()->query("SELECT * FROM crypto_users WHERE user_id = '$userid' AND stat = '1' LIMIT 1");
// 		if ($details->num_rows > 0) {
// 			echo "Details are coming up soon";
// 		}
// 	}
// }


if (isset($_POST["profilebtn"])) {
	$userid = $_SESSION["id"];
	$email = __("email");
	$phone = __("phone");
	$name = __("fullname");

	$updateprofile = $dircon->prepare("UPDATE crypto_users SET phone = ?, fullname = ? WHERE user_id = ? ");
	$updateprofile->bind_param("sss", $phone,$name, $userid);

	$exe = $updateprofile->execute();

	if ($exe) {
		echo json_encode(array('result' => "updated"));
	}

}

if (isset($_POST["passwordbtn"])) {
	 $userid = $_SESSION["id"];
	 $password1 = __("password1");
	 $password2 = __("password2");

	 if ($password1 != $password2) {
		echo json_encode(array('result' => "Password didn't match"));
	 }

	$updateprofile = $dircon->prepare("UPDATE crypto_users SET pwd = ? WHERE user_id = ? ");
	$updateprofile->bind_param("ss", $password1, $userid);

	$exe = $updateprofile->execute();

	if ($exe) {
		echo json_encode(array('result' => "success"));
	}

}



?>