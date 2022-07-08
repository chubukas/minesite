<?php 


$pagename = "Deposit";
include 'inc/head.php'; 

include 'inc/php/profiledetails.php';

$prodata = new Profiledetails;

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
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <form onsubmit="profile()">
                                                        <input type="text" id="fullname" value="<?php echo $prodata->name; ?>" name="fullname" class="form-control"  required="" placeholder="Fullname">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="number" id="phone" value="<?php echo $prodata->phone; ?>" name="phone" class="form-control" placeholder="Phone" >
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" id="email" name="email" class="form-control" value="<?php echo $prodata->email; ?>" placeholder="Email" disabled style="background-color: #152036;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button  type="submit" id="profilebtn" name="profilebtn" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update
                                                        </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form> 
                                        <br><br><br>
                                        <div class="row">
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                  <form onsubmit="changepassword()">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="password" id="password2" name="password2" class="form-control" placeholder="Comfirmed password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10" id="passwordbtn" id="passwordbtn">Update
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




                                                    