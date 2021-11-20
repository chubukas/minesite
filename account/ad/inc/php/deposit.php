<?php 

session_start();

// echo $_SESSION["id"];


include '../../../../dumps/connect.php';


if (isset($_POST["depbtn"])) {


        // global $test;
        // var_dump(connect());
        $userid = __("userid");
        $transact = __("transid");
        $amount = __("amounts");
        // $password1 = __("onepassword");
        // $btc = __("btcaddress");
        $harsh = uniqid().rand(000000000, 999999999).uniqid();
        // $pix = "";
        $stat = "1";
        $regdate = date("d-m-y");
        $ref = $_SESSION["harsh"];

        $transtype = "deposit";

        // if (isset($_SESSION["harsh"])) {
        //     $ref = $_SESSION["harsh"];
        // }

        $checktransact = $dircon->query("SELECT btc_trans_id FROM crypto_transaction WHERE btc_trans_id = '$transact'");
        if ($checktransact->num_rows > 0) {
            echo json_encode(["resp"=>"You have submited a request with this transaction ID before"]);
            die();
        }


        $insert =  $dircon->prepare("INSERT INTO crypto_transaction (user_id, transaction_type, amount, btc_trans_id, harsh, ref, reg_date, stat ) VALUES(?,?,?,?,?,?,?,?)");

        $insert->bind_param("ssssssss", $userid, $transtype, $amount, $transact, $harsh, $ref, $regdate, $stat);

                if ($insert->execute()){
                    
                    echo json_encode(["resp"=>"success"]);

                }else{
                    echo json_encode(["resp"=>"Failed please try again"]);
                    die();
            }
        }

 // user_id transaction_type    amount  btc_trans_id    harsh   reg_date    stat


 ?>


