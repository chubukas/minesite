<?php 

include '../../../../dumps/connect.php';




class Deleteuser extends connection
{
    
    function __construct()
    {
      $action = $_GET['action'];

      $userid = $_GET['usingid'];
        
        $takenaction = $this->connect()->query("DELETE FROM crypto_users WHERE user_id = '$userid' LIMIT 1");
        if ($takenaction) {
header("Location: ../../myusers");
        }        
    }
}

new Deleteuser;

 // " `crypto_users` WHERE `crypto_users`.`user_id` = 10"