<?php
include "includes/db.php";
if(isset($_GET['order_id'])){
                      
    $update_id = $_GET['order_id'];
    $complete="Cooked";
    $update_pending_order = "update pending_orders set cook_status='$complete' where order_id='$update_id'";

$run_pending_order = mysqli_query($con,$update_pending_order);

if($run_pending_order){

echo "<script>window.open('uncooked_orders.php','_self')</script>";

}



                    }

                    ?>