<?php 


$pagename = "Referrer";
// $bootstrap = "no";


include 'inc/head.php'; 
include 'inc/modals.php';

include 'inc/php/profiledetails.php';

include 'inc/php/referer.php';



$prodata = new Profiledetails;


?>

<div class="product-status mg-b-30" style="color: white;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div style="color: white; margin-bottom: 20px;">
                            <h5>Refer link : </h5>
                                <div class="input-group mg-b-pro-edt">
                                    <input type="text" id="myInput" value="<?php echo $prodata->myReflink; ?>" 
                                        name="myInput" class="form-control" disabled 
                                        style="color: black; font-weight:bold;"
                                    />
                                     <span class="input-group-addon"> 
                                         <button onclick="copyText()" style="color: black; font-weight:bold; padding: 8px;">Copy Link</button>
                                    </span>
                                </div>        
                        </div>
                        <div class="product-status-wrap">
                            <h4>Transactions</h4>
                            <table>
                                <tr>
                                    <th>SN</th>
                                    <th>Full name</th>
                                    <th>email</th>
                                    <th>Date</th>
                                </tr>
<?php  new Referers; ?>
                               
                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

<?php 

include 'inc/foot.php'; 

?>