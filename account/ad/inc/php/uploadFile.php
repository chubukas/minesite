<?php 
session_start();
include '../../../../dumps/connect.php';


class uploadCoinFile extends connection
{
	
    function __construct()
	{

        $coinAddress = __("coinAddress");
		$coinName = __("coinName");
        $show = "no";

            //generate unique file name
        $fileName = time().'_'.basename($_FILES["fileCoin"]["name"]);
        

            //file upload path
        $targetDir = "uploads/";
        $targetFilePath = $targetDir . $fileName;

            //allow certain file formats
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif');

        $response = "";

        if(in_array($fileType, $allowTypes))
        {
            //upload file to server
            if(move_uploaded_file($_FILES["fileCoin"]["tmp_name"], $targetFilePath))
            {


                $deposit = $this->connect()->query("SELECT * FROM mycoinwallets WHERE coin_name = '$coinName'");

                if ($deposit->num_rows > 0) 
                {
                    $sql = "UPDATE mycoinwallets SET coin_address = '$coinAddress', coin_image = '$fileName'  WHERE coin_name = '$coinName'";
                    $query = $this->connect()->query($sql);

                    if ($query) 
                    {
                       $response = 'Save successfully'; 
                    }
                    else
                    {
                       $response = 'Error saving files';  
                    }
                }
                else
                {
                    //insert file data into the database if needed
                    $insert =  $this->connect()->prepare("INSERT INTO  mycoinwallets (coin_name, coin_address, coin_image, show_coin) VALUES(?,?,?,?)");
                    $insert->bind_param("ssss", $coinName, $coinAddress, $fileName, $show);


                    if ($insert->execute())
                    {
                        $response = 'Save successfully';
                    }
                    else
                    {
                        $response = 'Error saving file'; 
                    } 
                }               
            }
            else
            {
                $response = 'Can not save file';;
            }
        }
        else
        {
            $response = 'Can not accept file type';
        }

        //render response data in JSON format
        echo $response;

	}
}


new uploadCoinFile;