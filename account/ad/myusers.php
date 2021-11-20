<?php 


$pagename = "My Users";
// $bootstrap = "no";


include 'inc/head.php'; 
include 'inc/modals.php';
include 'inc/php/myusers.php';



?>
  
<div class="product-status mg-b-30">
            <div class="container-fluid">
                <div>
                    <div>
                        <div class="product-status-wrap">
                            <h4>My Users</h4>
                            <div class="add-product">
                            </div>
                            <table>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Amount</th>
                                    <th>Update Amt</th>
                                     <th>ROI</th>
                                    <th>Update ROI</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                    <?php new Myuser; ?>                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

<?php 

include 'inc/foot.php'; 

?>