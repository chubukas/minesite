<?php 

include '../../dumps/connect.php';



/**
 * 
 */
class Transactions extends connection
{
	
	function __construct()
	{
		$this->sn = 1;
    	$userid = $_SESSION['id'];
    	
        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE user_id = '$userid' AND transaction_type != 'depositApproved' ORDER BY transaction_id DESC");
        if ($checkbal->num_rows > 0) {
        	while ($transdata = $checkbal->fetch_assoc()) {
        		$type = $transdata["transaction_type"];
        		$amount = $transdata["amount"];
        		$date = $transdata["reg_date"];
        		$status = $transdata["stat"];
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
                                    <td>$'.number_format($amount).'.00</td>

                                    <td>CRY7298389'.$transdata['transaction_id'].'</td>';

                  					if ($status == "11") {
                  						echo '

                  						
	                                    <td>
	                                        <button class="pd-setting"><i>completed</i></button>
	                                    </td>

                  						';
                  					}elseif ($status == "0") {
                  						echo '

                  							<td>
		                                        <button class="ds-setting"><i>denied</i></button>
		                                    </td>

                  						';
                  					}

                  					else{
                  						echo '
                  						<td>
	                                        <button class="ps-setting"><i>processing</i></button>
	                                    </td>
                  						';
                  					}




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