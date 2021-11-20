<?php 


$pagename = "Referrer";
// $bootstrap = "no";


include 'inc/head.php'; 
include 'inc/modals.php';
include 'inc/php/referer.php';



?>

<div class="product-status mg-b-30" style="color: white;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Transactions</h4>
                            <div class="add-product">
                                <a href="deposit">Deposit</a>
                            </div>
                            <table>
                                <tr>
                                    <th>SN</th>
                                    <th>Full name</th>
                                    <th>Amount</th>
                                    <th>Transaction Type</th>
                                    <th>Date</th>
                                </tr>
<?php new Referers; ?>
                               
                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

<?php 

include 'inc/foot.php'; 

?>