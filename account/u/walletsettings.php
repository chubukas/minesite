<?php 
$pagename = "Deposit";
// $bootstrap = "no";
// echo $bootstrap;
include 'inc/head.php'; 
include 'inc/modals.php';
include '../../dumps/connect.php';

/**
 * 
 */
class btcaddress extends connection
{
    public $btcaddress;
    
   public function __construct()
    {
        $walletsql = $this->connect()->prepare("SELECT * FROM crypto_users WHERE email = ?");
        $walletsql->bind_param("s", $_SESSION["email"]);
        $walletsql->execute();
        $walletdata = $walletsql->get_result();

        $fetchwallet = $walletdata->fetch_assoc();
        $this->btcaddress = $fetchwallet["btc_address"];

    }
}

$walletdatas = new btcaddress;


?>
        
        
 <div class="income-order-visit-user-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                          <form onsubmit="updatewallet()">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">

                                                    <h1 style="color: white"><?php //echo $walletdatas->btcaddress; ?></h1>
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input value="<?php echo $walletdatas->btcaddress; ?>" id="btcaddress" id="btcaddress" type="text" class="form-control" placeholder="BTC Address">
                                                    </div>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button class="btn btn-dark m-r-10" id="btcupdatebtn" name="btcupdatebtn">Submit
                                                        </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
     
     <br><br><br><br><br><br><br><br><br><br><br>
    

<?php 

include 'inc/foot.php'; 

?>