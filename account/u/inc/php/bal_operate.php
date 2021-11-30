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
    	
        // $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'deposit' AND stat = '11' AND user_id = '$userid'");
        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'depositApproved' AND user_id = '$userid'");
        if ($checkbal->num_rows > 0) {
        	while ($amount = $checkbal->fetch_assoc()) {
        		$this->deposit += $amount["amount"];
        	}
        }
        return $this->deposit;
    }


    public function recieves_bal()
    {
    	$this->receives = 0;
        
    	 $email = $_SESSION["email"];

        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'transfer' AND btc_trans_id = '$email'");
       
        if ($checkbal->num_rows > 0) {
        	while ($amount = $checkbal->fetch_assoc()) {
        		$this->receives += $amount["amount"];
        	}
        }
        return $this->receives;
    }


    public function withdrawals()
    {
    	$this->withdrawals = 0;

    	$userid = $_SESSION["id"];
    	
        // $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'withdraw4roi2wallet' AND stat = '11' AND user_id = '$userid'");
        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'withdraw' AND stat = '11' AND user_id = '$userid'");
        if ($checkbal->num_rows > 0) {
        	while ($amount = $checkbal->fetch_assoc()) {
        		$this->withdrawals += $amount["amount"];
        	}
        }
        return $this->withdrawals;
    }


    public function transfers()
    {
    	$this->transfers = 0;

    	$userid = $_SESSION["id"];
    	
        // $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'withdraw4roi2wallet' AND stat = '11' AND user_id = '$userid'");
        $checkbal = $this->connect()->query("SELECT * FROM crypto_transaction WHERE transaction_type = 'transfer' AND user_id = '$userid'");
        if ($checkbal->num_rows > 0) {
        	while ($amount = $checkbal->fetch_assoc()) {
        		$this->transfers += $amount["amount"];
        	}
        }
        return $this->transfers;
    }

    public function wallet_bal()
    {

        return ($this->deposit_bal() + $this->recieves_bal()) - $this->myInvesments();
       
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


    private function referer_bouns()
    {
        $this->returnrefs = 0;
    	$refs = $_SESSION["refs"];

         $checkbal = $this->connect()->query("SELECT * FROM referer_bouns WHERE ref = '$refs'");
        if ($checkbal->num_rows > 0) {
        	while ($amount = $checkbal->fetch_assoc()) {
                $this->returnrefs += $amount["bouns"];
        	}
        }
        return $this->returnrefs;
      
    }

    public function roi()
    {
    	// return $this->roi_bal() - $this->withdrawals() + $this->referer_bouns();
        return ($this->referer_bouns() + $this->myRoi_invest()) - ($this->transfers() + $this->withdrawals());
        
    }


    public function myRoi_invest()
    {
    	$this->roiInvest = 0;
    	$userid = $_SESSION['id'];
    	
        $checkroi = $this->connect()->query("SELECT * FROM investments WHERE user_id = '$userid'");
        if ($checkroi->num_rows > 0) {
        	while ($roiamount = $checkroi->fetch_assoc()) {
                $this->roiInvest += $roiamount["roi_invest"];
        	}

        return $this->roiInvest;
        }
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

    // echo $this->avail_bal();


    public function myInvesments()
    {
        $this->wallet = 0;
    	$userid = $_SESSION['id'];
    	
        $checkbal = $this->connect()->query("SELECT * FROM  investments WHERE user_id = '$userid'");
        if ($checkbal->num_rows > 0) {
        	while ($amount = $checkbal->fetch_assoc()) {
        		$this->wallet += $amount["amount"];
        	}
        }
        return $this->wallet;
    }

}



