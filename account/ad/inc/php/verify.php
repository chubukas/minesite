<?php 
include '../../../../dumps/connect.php';

session_start();



/**
 * 
 */
class Acceptpayment extends connection
{
    private $id;
    private $sql;
    function __construct()
    {
    	$harsh = $_SESSION["harsh"];

        $this->id = $_GET["approval"];
        $this->sql = "UPDATE crypto_transaction SET stat = '11' WHERE transaction_id = '$this->id'";
        $query = $this->connect()->query($this->sql);

        if ($query) {

            $check = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_id = '$this->id'");

            if ($check->num_rows > 0) 
            {
                $userdata = $check->fetch_assoc();

                $userId = $userdata["user_id"];
                $refs = $userdata["ref"];
                $transId = $userdata["transaction_id"];
                $mainAmount = $userdata["amount"];

                // $bouns =    (($mainAmount * 0.20 ) / 100 );
                $bouns =    ((10 / 100 ) * $mainAmount );

                $seletDeposit = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'depositApproved' AND user_id = '$userId'");  
             
                if ($seletDeposit->num_rows > 0) 
                {
                    $depositdata = $seletDeposit->fetch_assoc();
                    $depoitAmt = $depositdata["amount"] + $mainAmount;

                    $updatesql = "UPDATE crypto_transaction SET amount = '$depoitAmt' WHERE transaction_type = 'depositApproved' AND user_id = '$userId'";
                    $queryup =  $this->connect()->query($updatesql);

                    if ($queryup) 
                    {
                        echo "Payment Accepted";
                    }
                    else
                    {
                        echo "Failed please try again";
                        die();
                    }

                }
                else
                {
                    $transtype = "depositApproved";
                    $transact = 'updatedDeposit';
                    $harsh = uniqid().rand(100000000, 999999999).uniqid();
                    $ref = '0000000000';
                    $regdate = date("d/m/Y");
                    $stat = "1";

                    $insertdeposit =  $this->connect()->prepare("INSERT INTO crypto_transaction (user_id, transaction_type, amount, btc_trans_id, harsh, ref, reg_date, stat) VALUES(?,?,?,?,?,?,?,?)");

                    $insertdeposit->bind_param("ssssssss", $userId, $transtype, $mainAmount, $transact, $harsh, $ref, $regdate, $stat);
                                       
                    if ($insertdeposit->execute())
                    {    
                        echo "Payment Accepted";
                    }
                    else
                    {
                        echo "Failed please try again";
                        die();
                    }
                }

            }

            $checktransact = $this->connect()->query("SELECT transaction_id FROM referer_bouns WHERE transaction_id = '$transId'");

            if ($checktransact->num_rows > 0) {
                echo "Payment already accepted";
                die();
            }

            $insert =  $this->connect()->prepare("INSERT INTO referer_bouns (bouns, ref, transaction_id) VALUES(?,?,?)"); 
            $insert->bind_param("sss", $bouns, $refs, $transId);

            if ($insert->execute())
            {
                            
            echo " ". "Successfully";

            }else
            {
            echo "Failed please try again";
            die();
            }
        }    
        
    }
}


/**
 * 
 */
class Declinepayment extends connection
{
    private $id;
    private $sql;
    function __construct()
    {
    	$harsh = $_SESSION["harsh"];

        $this->id = $_GET["decline"];
        $this->sql = "UPDATE crypto_transaction SET stat = '1' WHERE transaction_id = '$this->id'";
        $query = $this->connect()->query($this->sql);

        if ($query) {
        	echo "Payment Declined";
        }
        
    }
}




if (isset($_GET["approval"])) {
    new Acceptpayment;
}


if (isset($_GET["decline"])) {
	new Declinepayment;
}




