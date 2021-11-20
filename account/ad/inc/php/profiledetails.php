<?php 
include '../../dumps/connect.php';

// echo $test;








/**
 * 
 */
class Profiledetails extends connection
{
	
	function __construct()
	{
		$userid = $_SESSION["id"];
		$details = $this->connect()->query("SELECT * FROM crypto_users WHERE user_id = '$userid' AND stat = '1' LIMIT 1");
		if ($details->num_rows > 0) {
			// echo "Details are coming up soon";
			while ($detail = $details->fetch_assoc()) {
				$this->name = $detail["fullname"];
				$this->email = $detail["email"];
				$this->phone = $detail["phone"];
				// $this->name = $detail["fullname"];
				// $this->name = $detail["fullname"];
			}
		}
	}
}




?>