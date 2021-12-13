<?php 




/**
 * 
 */
class Referers extends connection
{
	
	function __construct()
	{
		$this->sn = 1;
    	$userid = $_SESSION['id'];
        $refs = $_SESSION["refs"];

        $checkrefs = $this->connect()->query("SELECT * FROM crypto_users WHERE ref = '$refs' ORDER BY reg_date DESC");

        if ($checkrefs->num_rows > 0) 
        {
        	while ($transdata = $checkrefs->fetch_assoc()) 
            {
        		$type = $transdata["fullname"];
        		$date = $transdata["reg_date"];
                $email = $transdata["email"];
        		
                echo 
                '
                    <tr>
                        <td>'.$this->sn++.'</td>
                        <td>'.$type.'</td>
                        <td>'. $email.'</td>
                        <td>
                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                '.$date.'
                            </button>
                        </td>
                    </tr>
                ';
        	}
        }
	}
}


class ReferersBouns extends connection
{
	
	function __construct()
	{
		$this->sn = 1;
        $refs = $_SESSION["refs"];

        $bounsrefs = $this->connect()->query("SELECT referer_bouns.bouns, referer_bouns.reg_date as regdates, crypto_users.fullname FROM crypto_users JOIN referer_bouns WHERE crypto_users.ref = '$refs' AND crypto_users.user_id = referer_bouns.user_id");
        if ($bounsrefs->num_rows > 0) 
        {
        	while ($bounsdata = $bounsrefs->fetch_assoc()) 
            {
                
        		$bouns = $bounsdata["bouns"];
                $date = $bounsdata["regdates"];
                $names = $bounsdata["fullname"];

                echo 
                '
                    <tr>
                        <td>'.$this->sn++.'</td>
                        <td>'.$names.'</td>
                        <td>'. $bouns.'</td>
                        <td>
                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                '.$date.'
                            </button>
                        </td>
                    </tr>
                ';
        	}
        }

	}
}


?>