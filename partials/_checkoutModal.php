<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="checkoutModal">Enter Your Details:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="partials/_manageCart.php" method="post">
                <div class="form-group">
                    <b><label for="cafe_no">Select Caffe Name:</label></b>
                    
                   <select class="form-control" name="address">
                               
                                <?php  
                                $sql = 'SELECT *  FROM public.caffe_list;';
                                $result = pg_query($conn, $sql);
                                while ($row = pg_fetch_assoc($result)) {
                                    ?><option   value="<?php echo $row['caffe_id']; ?>"><?php echo $row['caffe_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>

                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                    <button type="submit" name="checkout" class="btn btn-success">Book</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>