<?php include '_dbconnect.php';?>
<?php 
    $itemModalSql = "SELECT * FROM \"orders\""; 
    $itemModalResult = pg_query($conn, $itemModalSql);
        while ($itemModalRow = pg_fetch_assoc($itemModalResult)) {
        $orderid = $itemModalRow['orderId'];
        $userid = $itemModalRow['userId'];
    
?>

<!-- Modal -->
<div class="modal fade" id="orderItem<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderItem<?php echo $orderid; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(111 202 203);">
                <h5 class="modal-title" id="orderItem<?php echo $orderid; ?>">Order Items (<b>Order Id: <?php echo $orderid; ?></b>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="container">
                    <div class="row">
                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table text">
                            <thead>
                                <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="px-3">Item</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="text-center">Quantity</div>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $pgsql = "SELECT * FROM orderitems WHERE \"orderId\" = $orderid";
                                    $pgresult = pg_query($conn, $pgsql);
                                        while ($myrow = pg_fetch_assoc($pgresult)) {
                                        $pizzaId = $myrow['pizzaId'];
                                        $itemQuantity = $myrow['itemQuantity'];
                                        
                                        $itemsql = "SELECT * FROM pizza WHERE \"pizzaId\" = $pizzaId";
                                        $itemresult = pg_query($conn, $itemsql);
                                        $itemrow = pg_fetch_assoc($itemresult);

                                        $pizzaName = $itemrow['pizzaName'];
                                        $pizzaPrice = $itemrow['pizzaPrice'];
                                        $pizzaDesc = $itemrow['pizzaDesc'];
                                        $pizzaCategorieId = $itemrow['pizzaCategorieId'];

                                        echo '<tr>
                                                <th scope="row">
                                                    <div class="p-2">
                                                    <img src="/EventPulse/img/pizza-'.$pizzaId. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> '.$pizzaName. '</h5><span class="text-muted font-weight-normal font-italic d-block">Rs. ' .$pizzaPrice. '/-</span>
                                                    </div>
                                                    </div>
                                                </th>
                                                <td class="align-middle text-center"><strong>' .$itemQuantity. '</strong></td>
                                            </tr>';
                                    }
                                ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
    }
?>