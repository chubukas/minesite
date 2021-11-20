<?php 
session_start();
include '../../../../dumps/connect.php';


class changeUserAmount extends connection
{
	
    function __construct()
	{

		$amount = __("amount");
		$userid = __("userid");

        $sql = "UPDATE crypto_transaction SET amount = '$amount' WHERE transaction_type = 'depositApproved' AND user_id = '$userid'";
        $query = $this->connect()->query($sql);

        if ($query) 
        {
            
            echo "Successfully Updated";
        }
        else
        {
            echo "Failed Please try again";
        }

        
	}
}


class changeRoiAmount extends connection
{
	
    function __construct()
	{
        $amount = __("amount");
		$userid = __("userid");

        $allcount = $this->connect()->query("SELECT COUNT(roi_invest) as allcount FROM investments WHERE user_id = '$userid'");

        $count =  $allcount->fetch_assoc()["allcount"];

        $total = $amount / $count;

        $sql = "UPDATE investments SET roi_invest = '$total' WHERE roi_invest IS NOT NULL AND user_id = '$userid'";

        $query = $this->connect()->query($sql);

        if ($query) 
        {
            
            echo "Successfully Updated";
        }
        else
        {
            echo "Failed Please try again";
        }
    }
}



if (isset($_GET["changeWalletAmount"])) {
    new changeUserAmount;
}

if (isset($_GET["changeRoiAmount"])) {
    new changeRoiAmount;
}

