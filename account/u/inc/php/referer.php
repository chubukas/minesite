<?php 

include '../../dumps/connect.php';



/**
 * 
 */
class Referers extends connection
{
	
	function __construct()
	{
		$this->sn = 1;
    	$userid = $_SESSION['id'];
        $refs = $_SESSION["refs"];

        // $checkrefs = $this->connect()->query("SELECT * FROM crypto_users WHERE ref = '$refs' ORDER BY reg_date DESC");
        $checkrefs = $this->connect()->query("SELECT fullname, crypto_transaction.reg_date as reg_date, transaction_type, amount FROM crypto_users LEFT JOIN crypto_transaction  ON crypto_users.user_id = crypto_transaction.user_id WHERE crypto_users.ref = '$refs' AND crypto_transaction.ref = '$refs' ");
        if ($checkrefs->num_rows > 0) {
        	while ($transdata = $checkrefs->fetch_assoc()) {
        		$type = $transdata["fullname"];
        		$amount = $transdata["amount"];
        		$date = $transdata["reg_date"];
        		$status = $transdata["transaction_type"];
        		// $type = $transdata["transaction_type"];
        		// $type = $transdata["transaction_type"];
        		// $type = $transdata["transaction_type"];
        		// $type = $transdata["transaction_type"];
        		

                    echo '


								<tr>
                                   <td>'.$this->sn++.'</td>
                                    <td>';



 								if ($type == "withdraw4roi2wallet") {
                                    	echo "Withdraw";
                                    }else{
                                    	echo $type;
                                    }                                   




                                   
                                     echo '</td>
                                    <td>$'.number_format($amount).'.00</td>';

                  					

 echo '<td>'.$status.'</td>';


                                    echo '<td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                            '.$date.'
                                        </button>
                                    </td>
                                </tr>



';
















        	}
        }
        // return $this->transact;
	}
}















?>