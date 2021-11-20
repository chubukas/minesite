<?php 

include '../../../../dumps/connect.php';




class Userbanding extends connection
{
    
    function __construct()
    {
      $action = $_GET['action'];

      $userid = $_GET['usingid'];
      // $ref = $_SESSION['harsh'];
        
        $takenaction = $this->connect()->query("UPDATE crypto_users SET stat = '$action' WHERE user_id = '$userid'");
        if ($takenaction) {
//             echo '
// <script type="text/javascript">
//     alert("Done");
// </script>
// ';
header("Location: ../../myusers");
        }
        
        // return $this->transact;
    }
}

new Userbanding;