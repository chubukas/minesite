<?php 

include '../../dumps/connect.php';



/**
 * 
 */
class Withdrawalrequest extends connection
{
    
    function __construct()
    {
        $this->sn = 1;
      $userid = $_SESSION['id'];
      $ref = $_SESSION['harsh'];
        
        $users = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'withdraw'");
        if ($users->num_rows > 0) {
            while ($withdata = $users->fetch_assoc()) {
                // $type = $transdata["transaction_type"]; 
               
            $amount = $withdata["amount"];
            $transuserid = $withdata["user_id"];
            // $email = $withdata["email"];
            // $date = $withdata["reg_date"];
            $date = $withdata["reg_date"];
            $address = $withdata["btc_trans_id"];

            $userdetail = $this->connect()->query("SELECT * FROM crypto_users WHERE user_id = '$transuserid'");
                if ($userdetail->num_rows > 0) {
                    $userdata = $userdetail->fetch_assoc();

                    $name = $userdata["fullname"];
                    $email = $userdata["email"];
                    $phone = $userdata["phone"];
                }

                


                echo '


                                <tr>
                                   <td>'.$this->sn++.'</td>
                                    <td>'.$name.'</td>

                                    <td>'.$address.'</td>

                                    
                                        
                                        <td>
                                            $'.number_format($amount).'
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