<?php 
session_start();


include '../../../../dumps/connect.php';


if (isset($_POST["investbtn"])) {


       $mydeposit = 0;
       $myinvest = 0;
       $myreceives = 0;

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

        $refs = $_SESSION["harsh"];

        $deposit = $dircon->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'depositApproved' AND user_id = '$userid'");

        $invest = $dircon->query("SELECT amount FROM investments WHERE user_id = '$userid'");

         $receives = $dircon->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'transfer' AND stat = '1' AND btc_trans_id = '$email'");


        if ($deposit->num_rows > 0) {
           while ($amount = $deposit->fetch_assoc()) {
                $mydeposit += $amount["amount"];
        	}
        }

         if ($invest->num_rows > 0) {
           while ($amounts = $invest->fetch_assoc()) {
                $myinvest += $amounts["amount"];
        	}
        }

        if ($receives->num_rows > 0) {
        	while ($amountres = $receives->fetch_assoc()) {
        		$myreceives += $amountres["amount"];
        	}
        }

        $returnamount = $mydeposit + $myreceives;
        $total = 0;

        if ($returnamount < $investamount) {
             echo json_encode(["resp"=>"You don't have upto this amount in your wallet"]);
            die();
        }

        if ($returnamount < ($investamount + $myinvest)) {
             echo json_encode(["resp"=>"You don't have upto this amount in your wallet"]);
            die();
        }

        $insert =  $dircon->prepare("INSERT INTO  investments (user_id, amount, num_days, roi_percent, reg_date) VALUES(?,?,?,?,?)");

        $insert->bind_param("sssss", $userid, $investamount, $days, $percent, $regdate);

                if ($insert->execute()){

                    $bouns =    ((10 / 100 ) * $investamount );
                    $transId  = uniqid().rand(100000000, 999999999).uniqid();

                    $boninsert =  $dircon->prepare("INSERT INTO referer_bouns (bouns, ref, transaction_id) VALUES(?,?,?)"); 
                    $boninsert->bind_param("sss", $bouns, $refs, $transId);

                    if ($boninsert->execute())
                    {

                        $to = $email;
                        $subject = 'Welcome to our platform';
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
                        $message = '<div style="color:black;font-size:18px;">';
                        $message .= '<p>Dear Esteemed Investor,</p>';
                        $message .= '<p>Your investment has been confirmed.</p>';
                        $message .= '<p>See more details below.</p>';
                        $message .= '<p>Plan: ' .$plans.'</p>';
                        $message .= '<p>Amount:' .$investamount.'USD</p>';
                        $message .= '<p>Daily Returns:' .$percent.'%</p>';
                        $message = '</div>';
                        $message .= '<br/><br/><br/><br/><br/>';
                        $message = '<div style="color:black;font-size:12px;">';
                        $message .= '<p>Best Regards,<br/> Vatican Investment Team.</p>';
                        $message = '</div>';
                        $message .= '</body></html>';

                        if(mail($to, $subject, $message, $headers))
                        {
                            // echo 'Your mail has been sent successfully.';
                            echo json_encode(["resp"=>"success"]);
                        }

                        // echo json_encode(["resp"=>"success"]);
                    }
                    else{
                        echo json_encode(["resp"=>"Failed... please try again"]);

                    }
                    
                }else{
                    echo json_encode(["resp"=>"Failed please try again"]);
                    die();
            }
        }



