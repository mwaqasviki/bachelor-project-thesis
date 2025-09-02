<?php


include("includes/function.php");

?>

<?php


$ip_add = getRealUserIp();

$delete_id = $_POST['id'];

$delete_chef = "delete from cart where food_id='$delete_id'";

$run_chef = mysqli_query($con,$delete_chef);
if($run_chef){

    
$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);
$total=0;
while($row_cart = mysqli_fetch_array($run_cart)){

    
    $qty = $row_cart['qty'];
    
    $only_price = $row_cart['food_price'];

    $subtotal=$qty*$only_price;
    $total+=$subtotal;

    

}

$check_food = "select * from cart where ip_add='$ip_add'";
$run_check = mysqli_query($con,$check_food);
$count=mysqli_num_rows($run_check);
// if($count>0){
// echo $count;
// }
echo $total.','.$count;
    
    }