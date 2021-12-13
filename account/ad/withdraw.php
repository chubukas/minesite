<?php 


$pagename = "Withdrawal Request";
// $bootstrap = "no";


include 'inc/head.php'; 
include 'inc/modals.php';
include 'inc/php/withdrawal.php';



?>
  
<div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Withdrawal Request</h4>
                            <div class="add-product">
                                <!-- <>Deposit</a> -->
                            </div>
                            <table>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Wallet Address</th>
                                    <th>Amount</th>
                                    <th>Coin</th>
                                    <th>Date</th>
                                     <th>Action</th>
                                </tr>
<?php new Withdrawalrequest; ?>


                              
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        

<?php 

include 'inc/foot.php'; 

?>