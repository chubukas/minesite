<?php 
session_start();
include '../../../../dumps/connect.php';


class Roipayment extends connection
{
	
		function __construct()
	{

		$roiamount = __("roiamount");
		$roiid = __("transid");
		$daty = date("d-m-Y");

		$check = $this->connect()->query("SELECT update_date, roi_invest FROM investments WHERE investment_id = '$roiid'");

		if ($check->num_rows > 0) {
			$dateData = $check->fetch_assoc();
			if ($daty == $dateData["update_date"]) {

				echo "Already updated";
					die();
				}

				$alreadyroi = $dateData["roi_invest"] + $roiamount;
		}


		 $sql = "UPDATE investments SET roi_invest = '$alreadyroi', update_date = '$daty' WHERE investment_id = '$roiid'";
        $query = $this->connect()->query($sql);

		if ($query) {
			
			echo "Successfully Credit";
		}
		else{
			echo "Failed Please try again";
		}

        
	}
}


new Roipayment;