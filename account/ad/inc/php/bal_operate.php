<?php 

include '../../dumps/connect.php';
// session_start();

/**
 * 
 */

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

    public function wallet_bal()
    {
    	return $this->deposit_bal() + $this->withdrawals();
    }



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

    public function roi()
    {
    	return $this->roi_bal() - $this->withdrawals();
    }



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




    public function accountlink()
    {
        $userid = $_SESSION['id'];
        $getlink = $this->connect()->query("SELECT * FROM crypto_users WHERE stat = '1' AND user_id = '$userid'");
        if ($getlink->num_rows > 0) {
            $data = $getlink->fetch_assoc();
            $this->link =  "localhost/cryptos/home?regx=".$data["ref"];
        }
        return $this->link;
    }

}







