<?php 

$pagename = "Transfer";

include 'inc/head.php'; 
include 'inc/modals.php';


?>
        
        
 <div class="income-order-visit-user-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <script type="text/javascript">
                            <?php 

                            if(isset($_GET["res"])){
                                $result = "working" ;
                            }else{
                                $result = "";
                            }

                            ?>

                            
                        </script>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">


                                        <!-- <h1 style="color:white">Checking this</h1> -->
                                        <div class="row">
                                          <form onsubmit="transfer()">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
                                                        <input id="amounts" name="amounts" type="number" class="form-control" placeholder="Amount">
                                                        <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id'] ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                        <input type="text" id="email" name="email" class="form-control" placeholder="Receiver Email">
                                                    </div>
                                                
                                                </div>
                                              </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds" id="transferwith">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button class="btn btn-dark m-r-10" id="transferbtn" name="transferbtn" > 
                                                        Transfer
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

