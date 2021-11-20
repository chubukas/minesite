<?php 

session_start();


include '../../../../dumps/connect.php';

class Operates extends connection
{

    public $deposit;
    
    public function deposit_bal()
    {
        $this->deposit = 0;
        $userid = $_SESSION['id'];
        
        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'deposit' AND stat = '11' AND user_id = '$userid'");
        if ($checkbal->num_rows > 0) {
            while ($amount = $checkbal->fetch_assoc()) {
                $this->deposit += $amount["amount"];
            }
        }
        return $this->deposit;
    }


//////////////////////////////////////////////////////////////////////////
    public function withdrawals()
    {
        $this->withdrawals = 0;

        $userid = $_SESSION["id"];
        
        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'withdraw4roi2wallet' AND stat = '11' AND user_id = '$userid'");
        if ($checkbal->num_rows > 0) {
            while ($amount = $checkbal->fetch_assoc()) {
                $this->withdrawals += $amount["amount"];
            }
        }
        return $this->withdrawals;
    }
////////////////////////////////////////////////////////////////////////////
    public function wallet_bal()
    {
        return $this->deposit_bal() + $this->withdrawals();
    }

////////////////////////////////////////////////////////////////////////////

    public function roi_bal()
    {
        $this->returnoni = 0;
        $userid = $_SESSION['id'];
        
        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'ROI' AND stat = '11' AND user_id = '$userid'");
        if ($checkbal->num_rows > 0) {
            while ($amount = $checkbal->fetch_assoc()) {
                $this->returnoni += $amount["amount"];
            }
        }
        return $this->returnoni;
    }
////////////////////////////////////////////////////////////////////////////
    public function roi()
    {
        return $this->roi_bal() - $this->withdrawals();
    }

////////////////////////////////////////////////////////////////////////////

     public function invest()
    {
        $this->invest = 0;
        $userid = $_SESSION['id'];
        
        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'invest' AND stat = '11' AND user_id = '$userid'");
        if ($checkbal->num_rows > 0) {
            while ($amount = $checkbal->fetch_assoc()) {
                $this->invest += $amount["amount"];
            }
        }
        return $this->invest;
    }

    // echo $this->avail_bal();

}



if (isset($_POST["withbtn"])) {


        // global $test;
        // var_dump(connect());
        $userid = __("userid");
        $reason = __("reason");
        $withfrom = __("withfrom");
        $withto = __("withto");
        $amount = __("amounts");
$bals = new Operates;

    $newbal = $bals->deposit_bal() - $bals->invest();

        if ($amount > $newbal + $bals->roi()) {
            echo json_encode(["resp"=>"Insufficient funds"]);
            die();
        }
// echo $bals->deposit_bal() - $bals->invest();

// die();

        // echo $withto.$withfrom;

        // $password1 = __("onepassword");
        // $btc = __("btcaddress");
        $harsh = uniqid().rand(100000000, 999999999).uniqid();
        // $pix = "";
        $stat = "1";
        $regdate = date("d-m-y");
        // $ref = "9834lk5jdsfo9ugjkr";

        $transtype;

        if ($withto == "Wallet") {
           $transtype = "withdraw4roi2wallet";
           $stat = "11";
        }elseif($withto == "Investment") {
            $transtype = "invest";
           $stat = "11";
        }else{
            $transtype = "withdraw";
           $stat = "1";
        }

        if (isset($_SESSION["harsh"])) {
            $ref = $_SESSION["harsh"];
        }

        // echo $transtype;
        // die();

      // $checktransact = $dircon->query("SELECT * FROM crypto_transaction WHERE btc_trans_id = '$transact'");
      //   if ($checktransact->num_rows > 0) {
      //       echo json_encode(["resp"=>"You have submited a request with this transaction ID before"]);
      //       die();
      //   }

        $insert =  $dircon->prepare("INSERT INTO crypto_transaction (user_id, transaction_type, amount, btc_trans_id, harsh, ref, reg_date, stat ) VALUES(?,?,?,?,?,?,?,?)");

        $insert->bind_param("ssssssss", $userid, $transtype, $amount, $reason, $harsh, $ref, $regdate, $stat);

                if ($insert->execute()){
                    
                    echo json_encode(["resp"=>"success"]);

                }else{
                    echo json_encode(["resp"=>"Failed please try again"]);
                    die();
            }
        }

 // user_id transaction_type    amount  btc_trans_id    harsh   reg_date    stat

// echo $_SESSION["id"];



 ?>


