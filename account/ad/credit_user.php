<?php 


$pagename = "Deposit";
include 'inc/head.php'; 

include 'inc/php/profiledetails.php';

$prodata = new Profiledetails;


/**
 * 
 */
class creditDetails extends connection
{

    public $wallet = 0;
    public $investment = 0;
    public $returns = 0;
    public $refbonus = 0;
    public $results = 0;
    public $creditUser = 0;
    public $mg = NULL;


    
    function __construct()
    {
        $creditUser = $_GET["usingid"];
        $getLatest = $this->connect()->query("SELECT * FROM balance WHERE user_id = '$creditUser' ORDER BY id DESC LIMIT 1");
        if ($getLatest->num_rows < 0) {
            return; // $this->mg = "No user was found";
        }else{
            $fetchD = $getLatest->fetch_assoc();
            $this->wallet = $fetchD["wallet"];
            $this->investment = $fetchD["investment"];
            $this->returns = $fetchD["returns"];
            $this->refbonus = $fetchD["referral_bonus"];
            // $this->wallet = $fetchD["wallet"];
            // $this->wallet = $fetchD["wallet"];
        }
    }
}


$userBal = new creditDetails;

?>


  
        
        
 <div class="income-order-visit-user-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        
                                        <div class="row">
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <label style="color: white">Wallet balance</label>
                                                    <div class="input-group mg-b-pro-edt">

                                                        
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <form method="POST">
                                                        <input type="text" id="" value="<?php echo $userBal->investment ?>" name="wallet" class="form-control"  required="" >
                                                    </div>
                                                    <label style="color: white">Investment balance</label>
                                                    <div class="input-group mg-b-pro-edt">

                                                        
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="number" id="phone" value="<?php echo $userBal->investment; ?>" name="investment" class="form-control" >
                                                    </div>
                                                    <label style="color: white">Returns </label>
                                                    <div class="input-group mg-b-pro-edt">

                                                        
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" id="email" name="returns" class="form-control" value="<?php echo $userBal->returns; ?>">
                                                    </div>
                                                    <label style="color: white">Bonus balance</label>
                                                    <div class="input-group mg-b-pro-edt">

                                                        
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" id="email" name="refbonus" class="form-control" value="<?php echo $userBal->refbonus; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button  type="submit" id="" name="crebtn" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Credit
                                                        </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form> 
                                        <br><br><br>
                                        
                                    </div>
                                                                     
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>      
     
     <br><br><br><br><br><br><br><br><br><br><br>
    

<?php 



class creditUser extends connection
{

    public $wallet = 0;
    public $investment = 0;
    public $returns = 0;
    public $refbonus = 0;
    public $results = 0;
    public $creditUser = 0;
    public $mg = NULL;
    
    function __construct()
    {
        $this->wallet = $_POST["wallet"];
        $this->investment = $_POST["investment"];
        $this->returns = $_POST["returns"];
        $this->refbonus = $_POST["refbonus"];
        // $this->results = $_POST["results"];
        $today = date("d/m/Y");

        $this->creditUser = $_GET["usingid"];
        $getLatest = $this->connect()->prepare("INSERT INTO balance (user_id, wallet, investment, returns, referral_bonus, redate) VALUES(?, ?, ?, ?, ?, ?)");
        $getLatest->bind_param("ssssss", $this->creditUser, $this->wallet, $this->investment, $this->returns, $this->refbonus, $today);
        if ($getLatest->execute()) {
            echo'
                <script type="text/javascript">
                    alert("This user has been credited successfully")
                </script>
                ';
        }else{
            echo'
                <script type="text/javascript">
                    alert("Failed please contact admin")
                </script>
                ';

                die("Fakadjflajkdlf" . $getLatest->error);
        }
    }
}

if (isset($_POST['crebtn'])) {
   new creditUser;
}

include 'inc/foot.php'; 

?>


                                                    