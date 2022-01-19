<?php 
session_start();


include '../../../../dumps/connect.php';


if (isset($_POST["investbtn"])) {

    $returnrefbouns = 0;
    $roiInvest = 0 ;
    $alltransfers = 0 ;
    $allwithdrawals = 0;

        $userid = $_SESSION["id"];
        $investamount = __("amounts");
        $days =  __("days");
        $percent =  __("percent");

        $plans = "";

        if ($percent == 5) {
            $plan = "BASIC";
        }
        else if ($percent == 6.5) {
            $plan = "STANDARD";
        }
        else if ($percent == 8) {
            $plan = "PREMIUM";
        }

        $regdate = date("d-m-Y");

        $email = $_SESSION["email"];

        $harsh = $_SESSION["harsh"];

        $refs = $_SESSION["refs"];


        $refbouns = $dircon->query("SELECT * FROM referer_bouns WHERE ref = '$refs'");
        $checkroi = $dircon->query("SELECT * FROM investments WHERE user_id = '$userid'");
        $transfers = $dircon->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'transfer' AND user_id = '$userid'");
        $withdraws = $dircon->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'withdraw' AND stat = '11' AND user_id = '$userid'");

        if ($refbouns->num_rows > 0) {
        	while ($amount = $refbouns->fetch_assoc()) {
                $returnrefbouns += $amount["bouns"];
        	}
        }

        if ($checkroi->num_rows > 0) {
        	while ($roiamount = $checkroi->fetch_assoc()) {
                $roiInvest += $roiamount["roi_invest"];
        	}
        }

        if ($transfers->num_rows > 0) {
        	while ($amount = $transfers->fetch_assoc()) {
        		$alltransfers += $amount["amount"];
        	}
        }

        if ($withdraws->num_rows > 0) {
        	while ($amount = $withdraws->fetch_assoc()) {
        		$allwithdrawals += $amount["amount"];
        	}
        }

        $roiReturns = ($returnrefbouns + $roiInvest) - ($alltransfers + $allwithdrawals);

        if ($roiReturns < $investamount) {
             echo json_encode(["resp"=>"You don't have upto this amount in your Roi Amount"]);
            die();
        }

        $roiwallet = "roiwallet";
        $insert =  $dircon->prepare("INSERT INTO  investments (user_id, amount, num_days, roi_percent, reg_date,invest_type) VALUES(?,?,?,?,?,?)");

        $insert->bind_param("ssssss", $userid, $investamount, $days, $percent, $regdate,$roiwallet);

                if ($insert->execute()){

                    $bouns =    ((10 / 100 ) * $investamount );
                    $transId  = uniqid().rand(100000000, 999999999).uniqid();

                    $boninsert =  $dircon->prepare("INSERT INTO referer_bouns (bouns, ref, transaction_id,reg_date,user_id) VALUES(?,?,?,?,?)"); 
                    $boninsert->bind_param("sssss", $bouns, $harsh, $transId,$regdate,$userid);

                    if ($boninsert->execute())
                    {


                        $allcount = $dircon->query("SELECT COUNT(roi_invest) as allcount FROM investments WHERE user_id = '$userid'");

                        $count =  $allcount->fetch_assoc()["allcount"];

                        $didv = $roiInvest - $investamount;

                        $total = $didv / $count;

                        $sqlss = "UPDATE investments SET roi_invest = '$total' WHERE roi_invest IS NOT NULL AND user_id = '$userid'";

                        $queryss = $dircon->query($sqlss);

                        if ($queryss) 
                        {
                            
                            
                            $to = $email;
                            $subject = 'Investment Confirmation';
                            $from = $email;

                            // To send HTML mail, the Content-type header must be set
                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
                            // Create email headers
                            $headers .= 'From: '.$from."\r\n".
                                'Reply-To: '.$from."\r\n" .
                                'X-Mailer: PHP/' . phpversion();

                            // Compose a simple HTML email message
                            $message = '<html><body>';
                            $message .= '<div style="color:black;font-size:18px;">';
                            $message .= '<p>Dear Esteemed Investor,</p>';
                            $message .= '<p>Your investment has been confirmed.</p>';
                            $message .= '<p>See more details below.</p>';
                            $message .= '<p>Plan: ' .$plans.'</p>';
                            $message .= '<p>Amount:' .$investamount.'USD</p>';
                            $message .= '<p>Daily Returns:' .$percent.'%</p>';
                            $message .= '</div>';
                            $message .= '<br/><br/><br/><br/><br/>';
                            $message .= '<div style="color:black;font-size:12px;">';
                            $message .= '<p>Best Regards,<br/> Vatican Investment Team.</p>';
                            $message .= '</div>';
                            $message .= '</body></html>';

                            if(mail($to, $subject, $message, $headers))
                            {
                                echo json_encode(["resp"=>"success"]);
                            }

                        }
                        else
                        {
                            echo json_encode(["resp"=>"Failed... please try again"]);
                        }

                    }
                    else{
                        echo json_encode(["resp"=>"Failed... please try again"]);

                    }
                    
                }else{
                    echo json_encode(["resp"=>"Failed please try again"]);
                    die();
            }
        }



