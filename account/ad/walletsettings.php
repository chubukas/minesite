<?php 

$pagename = "Deposit";
// $bootstrap = "no";
// echo $bootstrap;
include 'inc/head.php'; 
include 'inc/modals.php';


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
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input id="btcaddress" id="btcaddress" type="text" class="form-control" placeholder="BTC Address">
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