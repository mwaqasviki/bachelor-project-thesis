<?php
include("includes/db.php");
include("includes/function.php");
session_start();
if(isset($_POST['customer-id'])){

$customer_id = $_POST['customer-id'];

}

if(isset($_SESSION['table_no'])){

    $table= $_SESSION["table_no"];
   
    
    }
else{
    $table= rand(1,10);
}

$ip_add = getRealUserIp('table_no');

$status = "pending";
$cooked_status = "Uncooked";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

$price=0;
while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['food_id'];


$pro_qty = $row_cart['qty'];


$sub_total = $row_cart['food_price']*$pro_qty;

$price+=$sub_total;




$insert_pending_order = "insert into pending_orders (customer_id,food_id,invoice_no,qty,order_status,Cook_status,table_no,order_date) values ('$customer_id','$pro_id','$invoice_no','$pro_qty','$status','$cooked_status','$table',NOW())";

$run_pending_order = mysqli_query($con,$insert_pending_order);

$delete_cart = "delete from cart where ip_add='$ip_add'";

$run_delete = mysqli_query($con,$delete_cart);









}

$insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,order_date,order_status) values ('$customer_id','$price','$invoice_no','$pro_qty',NOW(),'$status')";
$run_customer_order = mysqli_query($con,$insert_customer_order);
 echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

?>