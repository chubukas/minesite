<?php 

include '../../dumps/connect.php';



/**
 * 
 */
class Myuser extends connection
{
	
	function __construct()
	{
		$this->sn = 1;
      $userid = $_SESSION['id'];
      $ref = $_SESSION['harsh'];
    	
        $users = $this->connect()->query("SELECT * FROM crypto_users WHERE stat = '1' AND  ref = '$ref'");
        if ($users->num_rows > 0) {
        	while ($usersdata = $users->fetch_assoc()) {
        		// $type = $transdata["transaction_type"]; 
        		// $amount = $transdata["amount"]; 
        		// $date = $transdata["reg_date"]; 
        		// $status = $transdata["stat"]; 
        		// $type = $transdata["transaction_type"]; 
        		// $type = $transdata["transaction_type"]; 
        		// $type = $transdata["transaction_type"]; 
        		// $type = $transdata["transaction_type"]; 
            $name = $usersdata["fullname"];
            $phone = $usersdata["phone"];
            $email = $usersdata["email"];
            $date = $usersdata["reg_date"];

        		


echo '


								<tr>
                                   <td>'.$this->sn++.'</td>
                                    <td>'.$name.'</td>

                                    <td>'.$email.'</td>

                  					
                  						
	                                    <td>
	                                        '.$phone.'
	                                    </td>
<td>
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