<?php 


include '../../../../dumps/connect.php';

session_start();


	
	if(isset($_POST["btcupdatebtn"]))
	{
		$btcadd = __("btcaddress");
		$userid = $_SESSION["id"];
		$updatebtc = $dircon->prepare("UPDATE crypto_users SET btc_address = ? WHERE user_id = ? ");
		$updatebtc->bind_param("ss", $btcadd, $userid);
		$exe = $updatebtc->execute();

		if ($exe) {
			echo json_encode(array('result' => "updated"));
		}else{
			echo json_encode(array('result' => "Failed"));
		}
	}




?>