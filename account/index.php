<?php 
include '../dumps/connect.php';

session_start();

/**
 * 
 */
class Auth extends connection
{
	
	function __construct()
	{	
		$email = $_SESSION["email"];

		$query = $this->connect()->query("SELECT * FROM crypto_users WHERE email = '$email' AND stat = '1' LIMIT 1");
		if ($query->num_rows > 0) {

			$userdata = $query->fetch_assoc();
			$_SESSION["name"] = $userdata["fullname"];
			$_SESSION["email"] = $userdata["email"];
			$_SESSION["pix"] = $userdata["pix"];
			$_SESSION["phone"] = $userdata["phone"];
			$_SESSION["role"] = $userdata["role"];
			$_SESSION["btc"] = $userdata["btcaddress"];
			$_SESSION["id"] = $userdata["user_id"];
			$_SESSION["harsh"] = $userdata["ref"];
			$_SESSION["last_time"] = time();

			$link = explode("=",$userdata["myReflink"]);

			$_SESSION["refs"] = $link[1];

			



			if ($_SESSION["role"] == "123_cryptos_user") {
				header("Location: u");
			}elseif ($_SESSION['role'] == "456_cryptos_admin") {
			
				header("Location: ad");
			}else{
				header("Location: ../");
				die();
			}

		}
	}
}

if (isset($_SESSION["email"])) {
	
	new Auth;

}else{
	// echo "Error";
	header("Location: ../");
	die();
}





// echo $_SESSION["name"] . $_SESSION["email"]. $_SESSION["role"];
// echo "This is outside condition";

?>


<!-- Dad was born in 1947 -->