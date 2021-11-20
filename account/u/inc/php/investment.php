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

        $regdate = date("d-m-Y");

        $email = $_SESSION["email"];

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

        // if ($myinvest > $returnamount) 
        // {
        //     $total = $myinvest  - $returnamount;
        // }
        // else
        // {
        //     $total =   $returnamount - $myinvest;
        // }

        // if ($investamount > $total) 
        // {
        //      echo json_encode(["resp"=>"You don't have upto this amount in your wallet"]);
        //     die();
        // }

        $insert =  $dircon->prepare("INSERT INTO  investments (user_id, amount, num_days, roi_percent, reg_date) VALUES(?,?,?,?,?)");

        $insert->bind_param("sssss", $userid, $investamount, $days, $percent, $regdate);

                if ($insert->execute()){
                    
                    echo json_encode(["resp"=>"success"]);

                }else{
                    echo json_encode(["resp"=>"Failed please try again"]);
                    die();
            }
        }



