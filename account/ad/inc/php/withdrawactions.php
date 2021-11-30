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

        $usingid = $_GET['usingid'];
        $transId = $_GET['transId']; 

        $takenaction = $this->connect()->query("UPDATE crypto_transaction SET stat = '$approve' WHERE user_id = '$usingid' AND transaction_id = '$transId'");

        if ($takenaction) 
        {
                        echo '
                <script type="text/javascript">
                    alert("Withdrawal Accepted Successfully");
                </script>
                ';
            header("Location: ../../withdraw");

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
                echo '
                <script type="text/javascript">
                    alert("Withdrawal Not accepted Successfully");
                </script>
                ';
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