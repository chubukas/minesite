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
            $transIds = $withdata["transaction_id"];
            $stat = $withdata["stat"];
            $coin = $withdata["harsh"];

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
                                    <td>'.$coin.'</td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                            '.$date.'
                                        </button>
                                    </td>
                                    <td>';
                                        if ($stat == 1) 
                                        {
                                        //    echo '<a class="btn btn-success btn-sm mx-2" href="inc/php/withdrawactions?usingid='.$transuserid.'&approve=11&transId='.$transIds.'">Approve</a>';
                                       echo '<input type="text" id="coinsuccess'.$transIds.'" style="color: black; width:100px;"/>';
                                       echo '<input type="hidden" id="coinemail'.$transIds.'" value="'.$email.'" />';
                                       echo '<input type="hidden" id="coincoins'.$transIds.'" value="'.$coin.'" />';
                                       echo '<button class="btn btn-success btn-sm mx-2" style="margin-right:4px;" id="sendwith'.$transIds.'" onclick="approveWithdraw('.$transuserid.','.$transIds.','.$amount.')">Approve</button>';
                                            echo '<a class="btn btn-danger ml-2 btn-sm" href="inc/php/withdrawactions?usingid='.$transuserid.'&decline=0&transId='.$transIds.'">Decline</a>';
                                        }
                                        else
                                        {
                                          if ($stat == 0) {
                                              echo '<div class="badge bg-danger">Decline</div>';
                                          } 
                                          
                                            if ($stat == 11) {
                                              echo '<div class="badge bg-success">Accepted</div>';
                                          } 
                                        }
                                       
                                        echo'
                                    </td>
                                </tr>



';
















            }
        }
        // return $this->transact;
    }
}















?>