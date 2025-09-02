<?php
include("includes/function.php");
include("includes/db.php");

if(isset($_POST['f_id'])){

$ip_add = getRealUserIp();


$f_id = $_POST['f_id'];
$f_price = $_POST['f_price'];

$qty=1;
$check_food = "select * from cart where ip_add='$ip_add' AND food_id='$f_id'";

$run_check = mysqli_query($con,$check_food);
$row_cart = mysqli_fetch_array($run_check);

if(mysqli_num_rows($run_check)>0){
    $qty=$row_cart['qty'];
    $qty++;
    $change_qty = "update cart set qty='$qty' where food_id='$f_id' AND ip_add='$ip_add'";

    $run_qty = mysqli_query($con,$change_qty);
    echo false;
// echo "<script>window.open('food.php','_self')</script>";

}
else{

$query = "insert into cart (food_id,ip_add,qty,food_price) values ('$f_id','$ip_add','$qty','$f_price')";

$run_query = mysqli_query($con,$query);

$check_food = "select * from cart where ip_add='$ip_add'";
$run_check = mysqli_query($con,$check_food);
$count=mysqli_num_rows($run_check);
if($count>0){
echo $count;
}

}

}



?>