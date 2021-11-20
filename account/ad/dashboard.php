<?php 

$pagename = "Dashboard";
$bootstrap = "true";

include 'inc/head.php'; 
include 'inc/modals.php';
include 'inc/php/bal_operate.php';
include 'inc/php/operates.php';

$amount = new Operates;


?>

<?php include "inc/modals.php" ?>     
        
        <div class="product-sales-area mg-t-50 mt-5">
            <div class="container text-center">
                <h1 class="text-center text-light">ADMIN ACCOUNT</h1>
                <center>
                    <hr class="bg-dark w-50 text-center">
                </center>
            </div>
        </div>
     
       
        <div class="widget-program-bg mb-5">
            <div class="container mb-5">
                <div style="margin-top: 20px; color: white;">
                    <center>
                        <h4>Update Coin address</h4>
                    </center>    
                </div>
                <form onsubmit="changeCoin()" enctype="multipart/form-data">                  
                    <div style="width: 60%; margin-top: 20px; color: white;" class="mx-auto">
                    
                        <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true">Coin wallet image</i></span>
                            <input type="file" id="fileCoin"  name="fileCoin" placeholder="update file" />
                        </div>
                        <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                            <select id="coinName"  name="coinName" class="form-control">
                                <option>Select crypto coin</option>
                                <option>BitCoin</option>
                                <option>Ethereum</option>

                            </select>
                        </div>
                        <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                            <input type="text" id="coinAddress"  name="coinAddress" class="form-control" placeholder="Coin address" >
                        </div>
            
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center custom-pro-edt-ds">
                                    <button  type="submit" id="filebtn" name="filebtn" class="btn btn-success waves-effect waves-light m-r-10">Save
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php 

include 'inc/foot.php'; 

?>