<?php 

include '../../dumps/connect.php';

class Payroi extends connection
{
    
    function __construct()
    {
        $this->sn = 1;
    //   $userid = $_SESSION['id'];
    //   $ref = $_SESSION['harsh'];

      $regdate = date("d-m-Y");
        
        $trans = $this->connect()->query("SELECT * FROM investments");
        if ($trans->num_rows > 0) {
            while ($transdata = $trans->fetch_assoc()) {
             
                $amount = $transdata["amount"]; 
                $date = $transdata["reg_date"]; 
                $transuserid = $transdata["user_id"]; 
                $transactID = $transdata["investment_id"]; 
                $transactdays = $transdata["num_days"];
                $transactpercent = $transdata["roi_percent"];

                $userdetail = $this->connect()->query("SELECT * FROM crypto_users WHERE user_id = '$transuserid'");
                if ($userdetail->num_rows > 0) {
                    $userdata = $userdetail->fetch_assoc();

                    $name = $userdata["fullname"];
                    $email = $userdata["email"];
                }

                $roiinvest  =    (($amount * $transactpercent ) / 100 );         
               $expired =  date('d-m-Y', strtotime($date. ' + '.$transactdays.' days'));

               $exp = strtotime($expired);
               $now = strtotime($regdate);

                if ($now < $exp) 
                {
                     
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
                                <button onclick="payroi('.$transactID.','.$roiinvest.')" data-toggle="tooltip" title="Credit daily returns" class="ps-setting w-100 mt-2">
                                    Credit ROI
                                </button>
                            </td>
                        </tr>
                    ';
                }
                else
                {
                  $reach = $this->connect()->query("SELECT  * FROM investments WHERE investment_id = '$transactID'");  

                    if ($reach->num_rows > 0) 
                    {
                        $sel = $reach->fetch_assoc();
                        $allAmount = $sel["amount"];
                        $allRoi = $sel["roi_invest"];

                        $total = $allAmount + $allRoi;

                        $sql = "UPDATE investments SET roi_invest = '$total', amount = 0 WHERE investment_id = '$transactID'";
                        $query = $this->connect()->query($sql);

                        if ($query) 
                        {
                
                            // echo "Successfully Credit finally";
                        }
                        else
                        {
                            // echo "Failed Please try again finally";
                        }

                    }
                }  

            }
        }
       
    }
}















?>