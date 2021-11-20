<?php 


$pagename = "Transactions";
// $bootstrap = "no";


include 'inc/head.php'; 
include 'inc/modals.php';
include 'inc/php/allusers.php';



?>
  
<div class="product-status mg-b-30">
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                </tr>
<?php new Myuser; ?>
                               <!--  <tr>
                                   <td>1</td>
                                    <td>Deposit</td>
                                    <td>$750</td>
                                    <td>CRY7298389</td>
                                    <td>
                                        <button class="pd-setting"><i>completed</i></button>
                                    </td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                            20/8/2020
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                   <td>1</td>
                                    <td>Withdraw</td>
                                    <td>$75450</td>
                                    <td>CRY7298389</td>
                                    <td>
                                        <button class="ps-setting"><i>processing</i></button>
                                    </td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                            20/8/2020
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                   <td>1</td>
                                    <td>ROI</td>
                                    <td>$750</td>
                                    <td>CRY7298389</td>
                                    <td>
                                        <button class="ds-setting"><i>denied</i></button>
                                    </td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                            20/8/2020
                                        </button>
                                    </td>
                                </tr> -->

                              
                            </table>
                           <!--  <div class="custom-pagination">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

<?php 

include 'inc/foot.php'; 

?>