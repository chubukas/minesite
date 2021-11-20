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
class Payroi extends connection
{
    
    function __construct()
    {
        $this->sn = 1;
      $userid = $_SESSION['id'];
      $ref = $_SESSION['harsh'];
        
        $trans = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'deposit'");
        if ($trans->num_rows > 0) {
            while ($transdata = $trans->fetch_assoc()) {
                $btc_trans_id = $transdata["btc_trans_id"]; 
                $amount = $transdata["amount"]; 
                $date = $transdata["reg_date"]; 
                $status = $transdata["stat"]; 
                $transuserid = $transdata["user_id"]; 
                $transactID = $transdata["transaction_id"]; 
                // $type = $transdata["transaction_type"]; 
                // $type = $transdata["transaction_type"]; 
                // $type = $transdata["transaction_type"]; 
                $userdetail = $this->connect()->query("SELECT * FROM crypto_users WHERE user_id = '$transuserid'");
                if ($userdetail->num_rows > 0) {
                    $userdata = $userdetail->fetch_assoc();

                    $name = $userdata["fullname"];
                    $email = $userdata["email"];
                }
         
echo '

                                <tr>
                                   <td>'.$this->sn++.'</td>
                                    <td>'.$name.'</td>

                                    <td>'.$email.'</td>
                                    <td>$'.number_format($amount).'.00</td>
                                  
                                    <td>
                                        <button data-toggle="tooltip" title="Credit daily returns" class="pd-setting-ed">
                                            '.$date.'
                                        </button>
                                    </td>
                                    <td>
                                        <!-- <form onsubmit="payroi('.$transuserid.','.$transactID.')"> -->
                                            <!-- <input type="hidden" name="userid" id="userid" value="'.$transuserid.'"> -->

                                           <!--  <input type="text" class="form-control" name="roiamount" id="'.$transactID.'"> -->

                                            <button onclick="payroi('.$transuserid.')" data-toggle="tooltip" title="Credit daily returns" class="ps-setting w-100 mt-2">
                                                Credit ROI
                                            </button>
                                        <!-- </form> -->
                                    </td>
                                </tr>

';
















            }
        }
        // return $this->transact;
    }
}















?>