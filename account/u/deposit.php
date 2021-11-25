<?php 

$pagename = "Deposit";
// $bootstrap = "yes";
// echo $bootstrap;
include 'inc/head.php'; 
include 'inc/modals.php';

include '../../dumps/connect.php';

$bitcoin =  $dircon->query("SELECT * FROM mycoinwallets WHERE coin_name = 'BitCoin'");
if ($bitcoin->num_rows > 0) 
{
    $Bcoin = $bitcoin->fetch_assoc();
    $bitcoinImage = $Bcoin["coin_image"];
    $bitcoinAddress = $Bcoin["coin_address"];
}


$ethereum =  $dircon->query("SELECT * FROM mycoinwallets WHERE coin_name = 'Ethereum'");

if ($ethereum->num_rows > 0) 
{
    $Ecoin = $ethereum->fetch_assoc();
    $ethereumImage = $Ecoin["coin_image"];
    $ethereumAddress = $Ecoin["coin_address"]; 
}


?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2"> <br>
                <div class="text-center custom-pro-edt-ds" id="responses">
                    
                </div>
                <br>
            </div>
        </div>
        
        <div class="income-order-visit-user-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <h3 style="color: white; font-style: underline; text-align: center; padding-bottom: 10px;">
                                        Bitcoin Payment
                                    </h3>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-4">
                                            <div class="review-content-section"> 
                                                <div class="input-group mg-b-pro-edt"> 
                                                    <p>
                                                        <img src="../ad/inc/php/uploads/<?php echo $bitcoinImage ?>" alt="">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-8">
                                            <form onsubmit="deposit()">         
                                                <div class="review-content-section">                                               
                                                    <div class="input-group mg-b-pro-edt overIn">
                                                        <div class="input-group mg-b-pro-edt">
                                                            <input type="text" id="myInputBTCnom" value="<?php echo $bitcoinAddress; ?>" 
                                                                name="myInputBTCnom" class="form-control" disabled 
                                                                style="color: black; font-weight:bold;"
                                                            />
                                                            <span class="input-group-addon"> 
                                                                <div onclick="copyTextBTC()" 
                                                                style="color: white; font-weight:bold; padding: 8px; cursor: pointer; ">Copy Link</div>
                                                            </span>
                                                        </div> 
                                                        <ul style="color: white;">
                                                            <li><i class="fa fa-dot-circle-o"></i> All payment should be made into the above accounts</li>
                                                            <li><i class="fa fa-dot-circle-o"></i> After payment, kindly paste the transaction ID for confirmation</li>
                                                        </ul>

                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input type="number" name="amounts" id="amounts" class="form-control" placeholder="Amount" oninput="exchangeCoin()">
                                                        <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id'] ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-bitcoin" aria-hidden="true"></i></span>
                                                        <input type="text" name="bitcoin" id="bitcoin" class="form-control" placeholder="Bitcoin" disabled style="background-color: green;"/>
                                                    </div>
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="transid" id="transid" placeholder="BTC transaction ID">
                                                    </div>
                                                </div>
                                                                                      
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="text-center custom-pro-edt-ds">
                                                            <button class="btn btn-dark m-r-10" name="depbtn" id="depbtn">Submit
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
            </div>
        </div>


        <!-- Etherum -->

         <div class="income-order-visit-user-area namehead">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <h3 style="color: white; font-style: underline; text-align: center; padding-bottom: 10px;">
                                        Etherum Payment
                                    </h3>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-4">
                                            <div class="review-content-section"> 
                                                <div class="input-group mg-b-pro-edt"> 
                                                    <p>
                                                        <img src="../ad/inc/php/uploads/<?php echo $ethereumImage ?>" alt="">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-8">
                                            <form onsubmit="depositEth()">         
                                                <div class="review-content-section">                                               
                                                    <div class="input-group mg-b-pro-edt overIn">
                                                        <div class="input-group mg-b-pro-edt">
                                                            <input type="text" id="myInputeht" value="<?php echo $ethereumAddress; ?>" 
                                                                name="myInputeht" class="form-control" disabled 
                                                                style="color: black; font-weight:bold;"
                                                            />
                                                            <span class="input-group-addon"> 
                                                                <div onclick="copyEth()" 
                                                                style="color: white; font-weight:bold; padding: 8px; cursor: pointer; ">Copy Link</div>
                                                            </span>
                                                        </div> 
                                                        <ul style="color: white;">
                                                            <li><i class="fa fa-dot-circle-o"></i> All payment should be made into the above accounts</li>
                                                            <li><i class="fa fa-dot-circle-o"></i> After payment, kindly paste the transaction ID for confirmation</li>
                                                        </ul>

                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input type="number" name="amountsEth" id="amountsEth" class="form-control" placeholder="Amount" oninput="exchangeCoinEth()">
                                                        <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id'] ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-diamond"></i></span>
                                                        <input type="text" name="ethcoin" id="ethcoin" class="form-control" placeholder="Etherum" disabled style="background-color: green;"/>
                                                    </div>
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="transidEth" id="transidEth" placeholder="ETH transaction ID">
                                                    </div>
                                                </div>
                                                                                        
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="text-center custom-pro-edt-ds">
                                                            <button class="btn btn-dark m-r-10" name="depbtn" id="depbtn">Submit
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
            </div>
        </div>

       
     
     <br><br><br><br><br><br><br><br><br><br><br>
    

<?php 

include 'inc/foot.php'; 

?>