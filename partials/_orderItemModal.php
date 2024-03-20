<?php 
    $itemModalSql = "SELECT * FROM orders WHERE \"userId\" = $1";
    $itemModalResult = pg_query_params($conn, $itemModalSql, array($userId));
    while ($itemModalRow = pg_fetch_assoc($itemModalResult)) {
        $orderid = $itemModalRow['orderId'];
  
    
    
?>

<!-- Modal -->
<div class="modal fade" id="orderItem<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderItem<?php echo $orderid; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderItem<?php echo $orderid; ?>">Order Items</h5>
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
                                   $mysql = "SELECT * FROM orderitems WHERE \"orderId\" = $1";
                                   $myresult = pg_query_params($conn, $mysql, array($orderid));
                                   while ($myrow = pg_fetch_assoc($myresult)) {
                                       $pizzaId = $myrow['pizzaId'];
                                       $itemQuantity = $myrow['itemQuantity'];
                                   
                                       $itemsql = "SELECT * FROM pizza WHERE \"pizzaId\" = $1";
                                       $itemresult = pg_query_params($conn, $itemsql, array($pizzaId));
                                       $itemrow = pg_fetch_assoc($itemresult);
                                       $pizzaName = $itemrow['pizzaName'];
                                       $pizzaPrice = $itemrow['pizzaPrice'];
                                       $pizzaDesc = $itemrow['pizzaDesc'];
                                       $pizzaCategorieId = $itemrow['pizzaCategorieId'];
                                   
                                       echo '<tr>
                                               <th scope="row">
                                                   <div class="p-2">
                                                       <img src="img/pizza-' . $pizzaId . '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                       <div class="ml-3 d-inline-block align-middle">
                                                           <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">' . $pizzaName . '</a></h5>
                                                           <span class="text-muted font-weight-normal font-italic d-block">Rs. ' . $pizzaPrice . '/-</span>
                                                       </div>
                                                   </div>
                                               </th>
                                               <td class="align-middle text-center"><strong>' . $itemQuantity . '</strong></td>
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