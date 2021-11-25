<?php

include 'dumps/connect.php';

class crodjobPayroi extends connection
{
    
    function __construct()
    {

      $regdate = date("d-m-Y");
        
        $trans = $this->connect()->query("SELECT * FROM investments");
        if ($trans->num_rows > 0) 
        {
            while ($transdata = $trans->fetch_assoc()) 
            {
             
                $amount = $transdata["amount"]; 
                $date = $transdata["reg_date"]; 
                $transactID = $transdata["investment_id"]; 
                $transactdays = $transdata["num_days"];
                $transactpercent = $transdata["roi_percent"];

                $roiinvest  =    (($amount * $transactpercent ) / 100 );         
                $expired =  date('d-m-Y', strtotime($date. ' + '.$transactdays.' days'));

                $exp = strtotime($expired);
                $now = strtotime($regdate);

                if ($now < $exp) 
                {

                    $check = $this->connect()->query("SELECT update_date FROM investments WHERE investment_id = '$transactID'");

                    if ($check->num_rows > 0) 
                    {
                        $dateData = $check->fetch_assoc();

                        if ($regdate == $dateData["update_date"]) 
                        {
                            echo "Already updated";
                            die();
                        }

                        $alreadyroi = $dateData["roi_invest"] + $roiinvest;
                    }

                    $sql = "UPDATE investments SET roi_invest = '$alreadyroi', update_date = '$regdate' WHERE investment_id = '$transactID'";
                    $query = $this->connect()->query($sql);
                    if ($query) 
                    {
			
                        echo "Successfully Credit";
                    }
                    else
                    {
                        echo "Failed Please try again";
                    }

                }
                else
                {
                  $reach = $this->connect()->query("SELECT  * FROM investments WHERE investment_id = '$transactID'");  

                    if ($reach->num_rows > 0) 
                    {
                        $sel = $reach->fetch_assoc();
                        $allAmount = $sel["amount"];
                        $allRoi = $sel["roi_invest"];

                        $total = $allAmount + $allRoi;

                        $sql = "UPDATE investments SET roi_invest = '$total', amount = 0 WHERE investment_id = '$transactID'";
                        $query = $this->connect()->query($sql);

                        if ($query) 
                        {
                
                            echo "Successfully Credit finally";
                        }
                        else
                        {
                            echo "Failed Please try again finally";
                        }

                    }
                } 

            }
        }
       
    }
}

new crodjobPayroi;