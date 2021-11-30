<?php

session_start();


include '../../../../dumps/connect.php';

if (isset($_POST["withbtn"])) {


        $returnrefs = 0;
        $roiInvest = 0;

    	$refs = $_SESSION["refs"];
        $userId = __("userid");
        $withamount = __("amounts");
        $wallet = __("wallet");

         $checkbal = $dircon->query("SELECT * FROM referer_bouns WHERE ref = '$refs'");
        if ($checkbal->num_rows > 0) {
        	while ($checkamount = $checkbal->fetch_assoc()) {
                $returnrefs += $checkamount["bouns"];
        	}
        }

         $checkroi = $dircon->query("SELECT * FROM investments WHERE user_id = '$userId'");
        if ($checkroi->num_rows > 0) {
        	while ($roiamount = $checkroi->fetch_assoc()) {
                $roiInvest += $roiamount["roi_invest"];
        	}
        }

        $checktransfers = $dircon->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'transfer' AND stat = '1' AND user_id = '$userId'");
        if ($checktransfers->num_rows > 0) {
        	while ($amount = $checktransfers->fetch_assoc()) {
        		$transfers += $amount["amount"];
        	}
        }

        $checktwithdraw = $dircon->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'withdraw' AND stat = '1' AND user_id = '$userId'");
        if ($checktwithdraw->num_rows > 0) {
        	while ($amount = $checktwithdraw->fetch_assoc()) {
        		$withdraws += $amount["amount"];
        	}
        }

        $totalRoi = ($returnrefs + $roiInvest) - ($transfers + $withdraws);

        if ($withamount >  $totalRoi) {
            echo json_encode(["resp"=>"Insufficient funds"]);
            die();
        }

        $harsh = uniqid().rand(100000000, 999999999).uniqid();

        $transtype = "withdraw";
        $regdate = date("d-m-y");
        $stat = "1";

         if (isset($_SESSION["harsh"])) {
            $ref = $_SESSION["harsh"];
        }

        $insert =  $dircon->prepare("INSERT INTO crypto_transaction (user_id, transaction_type, amount, btc_trans_id, harsh, ref, reg_date, stat ) VALUES(?,?,?,?,?,?,?,?)");

        $insert->bind_param("ssssssss", $userId, $transtype, $withamount, $wallet, $harsh, $ref, $regdate, $stat);

                if ($insert->execute()){
                    
                    echo json_encode(["resp"=>"success"]);

                }else{
                    echo json_encode(["resp"=>"Failed please try again"]);
                    die();
            }


}