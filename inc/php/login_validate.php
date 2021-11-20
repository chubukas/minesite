<?php 
include '../../dumps/connect.php';

// echo $test;


class Login_validate extends connection
{
	
	function __construct()
	{
		$email = __("loginemail");
		$password = __("loginpassword");

		// $connections = new visocon;
		// var_dump($connections);

		$selectdata = $this->connect()->prepare("SELECT * FROM users WHERE email = ?, AND password = ?");
		if($selectdata){
			echo "Seleted";
		}
	}
}






if (isset($_POST["loginbtn"])) {
		$email = __("loginemail");
		$password = __("loginpassword");
		$stat = "1";

		$selectdata = $dircon->prepare("SELECT * FROM crypto_users WHERE email = ? AND pwd = ? LIMIT 1");
		$selectdata->bind_param("ss", $email, $password);
		$selectdata->execute();

		$data = $selectdata->get_result();
		  if ($data->num_rows > 0) {

			$auth = $data->fetch_assoc();
			if ($auth["stat"] == 0) {
				echo json_encode(["result"=>"Your account as been suspended for security reasons. Kindly contact an admin for account verification. Thank you."]);
			 	die();
			}


			 			session_start();

						$_SESSION["email"] = $email;


				 		if (isset($_SESSION["email"])) {
				 			 echo json_encode(["result"=>"logged In"]);	
				 			}	
				 			die(); 		
			 		
			 }else{
			 	echo json_encode(["result"=>"Invalid login details"]);
			 	die();
			 }
			// echo $selectdata->store_result();

		// }
		// else{
		// 	echo json_encode(["result"=>"Failed to execute"]);
		// 	die();
		// }

		// if ($selectdata->store_result(); > 0) {
		// 	echo "Logged in";
		// }
		// if($selectdata){
		// 	echo "Seleted";
		// }
}else{
	echo json_encode(["result"=>"Kindly login using the right way", "multi"=>["key"=>"pair", "multi"=>["key"=>"pair", "multi"=>["key"=>"pair"]]], "isLoggedIn" => false]);
	die();
}

 // new mysqli(.....);
 // $param = $_GET['manf'];

 // $stmt = $conn->prepare('select manf from manf where manf = ?');
 // $stmt->bind_param('s', $param);
 // $stmt->execute();
 // $stmt->bind_result($result);

 // echo $stmt->num_rows;

 // while($stmt->fetch()){
 //     echo $result;
 // }
 // $stmt->close();

// echo "string";


?>