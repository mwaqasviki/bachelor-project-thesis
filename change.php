<?php

session_start();


include("includes/function.php");

?>

<?php


$ip_add = getRealUserIp();

if(isset($_POST['id'])){

$id = $_POST['id'];

$qty = $_POST['quantity'];

$change_qty = "update cart set qty='$qty' where food_id='$id' AND ip_add='$ip_add'";

$run_qty = mysqli_query($con,$change_qty);

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);
$total=0;
while($row_cart = mysqli_fetch_array($run_cart)){

    
    $qty = $row_cart['qty'];
    
    $only_price = $row_cart['food_price'];

    $subtotal=$qty*$only_price;
    $total+=$subtotal;

    

}

echo $total;
}


?>