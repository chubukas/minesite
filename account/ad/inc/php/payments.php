<?php 

include '../../dumps/connect.php';


// {
//         $this->deposit = 0;
//         $userid = $_SESSION['id'];
        
//         $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'deposit' AND stat = '11' AND user_id = '$userid'");
//         if ($checkbal->num_rows > 0) {
//             while ($amount = $checkbal->fetch_assoc()) {
//                 $this->deposit += $amount["amount"];
//             }
//         }
//         return $this->deposit;
//     }
/**
 * 
 */
class Payments extends connection
{
    
    function __construct()
    {
        $this->sn = 1;
      $userid = $_SESSION['id'];
      $ref = $_SESSION['harsh'];
        
        $trans = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'deposit' ORDER BY transaction_id DESC");
        if ($trans->num_rows > 0) {
            while ($transdata = $trans->fetch_assoc()) {
                $btc_trans_id = $transdata["btc_trans_id"]; 
                $amount = $transdata["amount"]; 
                $date = $transdata["reg_date"]; 
                $status = $transdata["stat"]; 
                $transuserid = $transdata["user_id"]; 
                $transactionid = $transdata["transaction_id"]; 
                // $type = $transdata["transaction_type"]; 
                // $type = $transdata["transaction_type"]; 
                // $type = $transdata["transaction_type"]; 
                $userdetail = $this->connect()->query("SELECT * FROM crypto_users WHERE user_id = '$transuserid'");
                if ($userdetail->num_rows > 0) {
                    $userdata = $userdetail->fetch_assoc();

                    $name = $userdata["fullname"];
                    $email = $userdata["email"];
                }
         
                if ($status != "11") {
                    
                            echo '
                                <tr>
                                   <td>'.$this->sn++.'</td>
                                    <td>'.$name.'</td>

                                    <td>'.$email.'</td>
                                    <td>$'.number_format($amount).'.00</td>
                                  
                                    
                                        
                                        <td>
                                            '.$btc_trans_id.'
                                        </td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                            '.$date.'
                                        </button>
                                    </td>
                                    <td>
                                        <button id="'.$transuserid.'" onclick="acceptpayment('.$transactionid.')" data-toggle="tooltip" title="Edit" class="pd-setting ">
                                            Accept
                                        </button>
                                        <button id="'.$transuserid.'" onclick="declinepayment('.$transactionid.')" data-toggle="tooltip" title="Edit" class="ds-setting">
                                            Decline
                                        </button>
                                    </td>
                                </tr>
                            ';
                }




            }
        }
      
    }
}



?>