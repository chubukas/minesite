<?php 

$pagename = "Re-Invest";
$bootstrap = "true";

include 'inc/head.php'; 
include 'inc/modals.php';
include 'inc/php/bal_operate.php';

$amount = new Operates;
?>

        
        
         <div class="widget-program-bg mb-5">
            <div class="container-fluid mb-5">


                        <div class="income-dashone-total reso-mg-b-30" style="margin-bottom: 30px;">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total" style="text-align: center;">
                                    <div class="price-nalika-rate">
                                        <h3><span>$</span><span class="counter"><?php echo number_format($amount->roi()).".00" ?></span></h3>
                                    </div>
                                    
                                </div>
                                <div style="text-align: center;color: white;font-weight: bold;">
                                    <p style="text-align: center;">ROI Amount</p>
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>

                
                <div class="row">
                    <div class="col-12" id="reResponseInvest"></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="hpanel hbgblue responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-bg-pro">
                                    <h3 class="mt-5 mb-5">BASIC </h3>
                                    <p class="text-big font-light">
                                    </p>

                                  <div class="table-responsive">
                                    <table class="table">
                                      
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="text-light font-weight-bold font-bold">Minimum Investment</span>
                                                </td>
                                                <td>$200.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-light font-weight-bold font-bold">Return on Investment</span>
                                                </td>
                                                <td>5% daily</td>
                                            </tr>
                                        </tbody>
                                        <div>
                                            <p>
                                                <span class="text-light font-weight-bold font-bold">7 days lock period</span>
                                            </p>    
                                        </div>
                                    </table>
                                </div>
                                    <br>
                                    <form onsubmit="reinvest('rebasicAmount','rebasicbtn',7,5)">
                                    <div class="input-group mg-b-pro-edt">
                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                        <input type="number" name="rebasicAmount" id="rebasicAmount" class="form-control" placeholder="Amount" min="200">
                                        <input type="hidden" name="reinuserid" id="reinuserid" value="<?php echo $_SESSION['id'] ?>">
                                    </div>
                                    <button class="mb-2 btn btn-sm btn-outline-light" name="investbtn" id="rebasicbtn">INVEST</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="hpanel hbgblue responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-bg-pro">
                                    <h3 class="mt-5 mb-5" > STANDARD</h3>
                                   
                                    <div class="table-responsive">
                                    <table class="table">
                                      
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="text-light font-weight-bold font-bold">Minimum Investment</span>
                                                </td>
                                                <td>$5,000</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-light font-weight-bold font-bold">Return on Investment</span>
                                                </td>
                                                <td>6.5% daily</td>
                                            </tr>
                                        </tbody>
                                        <div>
                                            <p>
                                                <span class="text-light font-weight-bold font-bold">10 days lock period</span>
                                            </p>    
                                        </div>
                                    </table>
                                </div>
                                <br>
                                <form onsubmit="reinvest('restandardAmount','restandardbtn',10,6.5)">
                                    <div class="input-group mg-b-pro-edt">
                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                        <input type="number" name="restandardAmount" id="restandardAmount" class="form-control" placeholder="Amount" min="5000">
                                        <input type="hidden" name="reinuserid" id="reinuserid" value="<?php echo $_SESSION['id'] ?>">
                                    </div>
                                    <button class="mb-2 btn btn-sm btn-outline-light" name="investbtn" id="restandardbtn">INVEST</button>
                                </form>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-5">
                        <div class="hpanel hbgblue responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-bg-pro">
                                    <h3 class="mt-5 mb-5" >PREMIUM</h3>
                                    <div class="table-responsive">
                                    <table class="table">
                                      
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="text-light font-weight-bold font-bold">Minimum Investment</span>
                                                </td>
                                                <td>$10,000.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-light font-weight-bold font-bold">Return on Investment</span>
                                                </td>
                                                <td>8% daily</td>
                                            </tr>
                                        </tbody>
                                        <div>
                                            <p>
                                                <span class="text-light font-weight-bold font-bold">14 days lock period</span>
                                            </p>    
                                        </div>
                                    </table>
                                </div>
                                <br>
                                <form onsubmit="reinvest('repremiumAmount','repremiumbtn',14,8)">
                                    <div class="input-group mg-b-pro-edt">
                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                        <input type="number" name="repremiumAmount" id="repremiumAmount" class="form-control" placeholder="Amount" min="10000">
                                        <input type="hidden" name="reinuserid" id="reinuserid" value="<?php echo $_SESSION['id'] ?>">
                                    </div>
                                    <button class="mb-2 btn btn-sm btn-outline-light" name="investbtn" id="repremiumbtn">INVEST</button>
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

