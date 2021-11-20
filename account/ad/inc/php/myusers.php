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
        
        $users = $this->connect()->query("SELECT * FROM crypto_users ORDER BY user_id DESC ");
        if ($users->num_rows > 0) 
        {
            while ($usersdata = $users->fetch_assoc()) 
            {
            
                $role = $usersdata["role"]; 
                $stat = $usersdata["stat"]; 
                $name = $usersdata["fullname"];
                $uid = $usersdata["user_id"];
                $phone = $usersdata["phone"];
                $email = $usersdata["email"];
                $date = $usersdata["reg_date"];
                $country = $usersdata["country"];
                $password = $usersdata["pwd"];

                
                $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'depositApproved' AND user_id = '$uid'");
                if ($checkbal->num_rows > 0) 
                {
                
                    $amount = $checkbal->fetch_assoc() ;
                 
                    $deposit = $amount["amount"];
                  
                }

                $myreceive = 0;
                $receive = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'transfer' AND stat = '1' AND btc_trans_id = '$email'");
                if ($receive->num_rows > 0) 
                {
                    while ($amounts = $receive->fetch_assoc()) 
                    {
                        $myreceive += $amounts["amount"];
                    }
                }

                $myinvest = 0;
                $invets = $this->connect()->query("SELECT * FROM  investments WHERE user_id = '$uid'");
                if ($invets->num_rows > 0) 
                {
                    while ($amounted = $invets->fetch_assoc()) 
                    {
                        $myinvest += $amounted["amount"];
                    }
                }

                $roiInvest = 0;
                $checkroi = $this->connect()->query("SELECT * FROM investments WHERE user_id = '$uid'");
                if ($checkroi->num_rows > 0) 
                {
                    while ($roiamount = $checkroi->fetch_assoc()) 
                    {
                        $roiInvest += $roiamount["roi_invest"];
                    }
                }

                $depoRece = $deposit + $myreceive;

                $total = $depoRece - $myinvest;

                $total = (int)$total;


                if ($role != "456_cryptos_admin") 
                {
                    echo '
                        <tr>
                        <td>'.$this->sn++.'</td>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$password.'</td>
                            <td> '.$phone.'</td>
                            <td>'.$country.'</td>
                            <td>'.$total.'</td>
                            <td>
                                <form onsubmit="updateAmount('.$uid.','.$deposit.')" >
                                   <div class="input-group mg-b-pro-edt" style="padding-top: 10px;">
                                        <input type="number" name="useramount'.$uid.'"
                                            id="useramount'.$uid.'"
                                            style="color: black; font-weight:bold; width:100px;"
                                        />
                                    </div>
                              </form>
                            </td>
                             <td>'.$roiInvest.'</td>
                            <td>
                                <form onsubmit="updateRoi('.$uid.')" >
                                   <div class="input-group mg-b-pro-edt" style="padding-top: 10px;">
                                        <input type="number" name="roiamount'.$uid.'"
                                            id="roiamount'.$uid.'"
                                            style="color: black; font-weight:bold; width:100px;"
                                        />
                                    </div>
                              </form>
                            </td>
                            <td>
                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                    '.$date.'
                                </button>
                            </td>
                            <td>';
                                if ($stat == 1) 
                                {
                                    echo '<div class="d-flex"> <a class="btn btn-danger btn-sm" href="inc/php/bandunband?usingid='.$uid.'&action=0">Band</a>';
                                }
                                else
                                {
                                    echo '<a class="btn btn-success btn-sm" href="inc/php/bandunband?usingid='.$uid.'&action=1">Unband</a>';
                                }
                                echo '<a class="btn btn-warning mr-1 btn-sm" href="inc/php/deleteuser?usingid='.$uid.'&action=1">Delete</a>';
                                echo' </div>
                            </td>
                        </tr>
                    ';
                }
            }
        }
    }
}
