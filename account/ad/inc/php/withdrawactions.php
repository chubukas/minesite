<?php 

include '../../../../dumps/connect.php';


/**
 * 
 */
class Acceptwithdraw extends connection
{
    function __construct()
    {
        $approve = $_GET['approve'];

        // $usingid = $_GET['usingid'];
        // $transId = $_GET['transId']; 

        $amount = __("amount");
		$email = __("email");
        $transId = __("transid");
		$usingid = __("userid");
        $coinsuccess = __("coinsuccess");
        $calculate = __("calculate");
        $coin = __("coin");

        $takenaction = $this->connect()->query("UPDATE crypto_transaction SET stat = '$approve' WHERE user_id = '$usingid' AND transaction_id = '$transId'");

        if ($takenaction) 
        {

            $to = $email;
            $subject = 'Payment Confirmation';
            $from = $email;

            
            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
            // Create email headers
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();

            
            $links='';

            if ($coin == "BitCoin") {
                $links = 'https://www.blockchain.com/btc/tx/'.$coinsuccess.'';
            }

              elseif ($coin == "Ethereum") {
                $links = 'https://www.blockchain.com/eth/tx/'.$coinsuccess.'';

              }


            // Compose a simple HTML email message
            $message = '<html><body>';
            $message .= '<div style="color:black;font-size:18px;">';
            $message .= '<p>Dear Esteemed Investor,</p>';
            $message .= '<p>Your withdrawal has been processed and funds credited to your ' .$coin. ' Wallet.</p>';
            $message .= '<p>See more details below.</p>';
            $message .= '<p>Amount:' .$calculate.'('.$amount.'USD)</p>';
            $message .= '<p>Transaction ID: <a href="'.$links.'">'.$links.'</a> </p>';
            $message .= '</div>';
            $message .= '<br/><br/><br/><br/><br/>';
            $message .= '<div style="color:black;font-size:12px;">';
            $message .= '<p>Best Regards,<br/> Vatican Investment Team.</p>';
            $message .= '</div>';
            $message .= '</body></html>';

            if(mail($to, $subject, $message, $headers))
            {
                // echo 'Your mail has been sent successfully.';
                echo "Successfully Approved!!!";
            }

        }
    }
}

class Declinewithdraw extends connection
{
    function __construct()
    {
        $decline = $_GET['decline'];

        $usingid = $_GET['usingid'];
        $transId = $_GET['transId']; 

        $takenaction = $this->connect()->query("UPDATE crypto_transaction SET stat = '$decline' WHERE user_id = '$usingid' AND transaction_id = '$transId'");

        if ($takenaction) 
        {
            header("Location: ../../withdraw");

        }
    }
}

if (isset($_GET["approve"])) {
    new Acceptwithdraw;
}


if (isset($_GET["decline"])) {
	new Declinewithdraw;
}