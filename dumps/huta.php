<?php 
include 'connect.php';

/**
 * 
 */
class payreturns extends connection
{
	private $allinvestquery = "SELECT * FROM crypto_transaction WHERE transaction_type = ? AND stat = ?";
	private $roi = "INSERT INTO crypto_transaction (user_id, transaction_type, amount, btc_trans_id, harsh, ref, reg_date, stat ) VALUES(?,?,?,?,?,?,?,?)";
	
	public function __construct()
	{
		$type = "invest";
		$transtype = "roi";
		$stat = "11";
		$getInvestment = $this->connect()->prepare($this->allinvestquery);
		$getInvestment->bind_param("ss", $type, $stat);
		$getInvestment->execute();

		$inresult = $getInvestment->get_result();
		while ($investdata = $inresult->fetch_assoc()) {

			$amount = $investdata["amount"];
			$btcadd = "none";
			$harsh = rand(0000,9999);
			$refs = $harsh;
			$reg_date = date("l s:m:h d-m-Y");
			$stat = "11";
$newamount = 0;
			if ($amount < 2000) {
				$newamount = $amount * 0.025;
			}elseif ($amount < 500) {
				$newamount = $amount * 0.03;
			}
		// echo $newamount."<br>";

		if ($amount < 2000) {
			$newroi = $this->connect()->prepare($this->roi);
			$newroi->bind_param("ssssssss", $investdata["user_id"], $transtype, $newamount, $btcadd, $harsh, $refs, $reg_date, $stat);
			$newroi->execute();
		}
			



		}
	}
}

new payreturns;

