<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Predicted Food

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Predicted Food

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>#</th>
<th>Food Name</th>
<th>Food Quantity</th>
<th>Sales</th>
<th>Demand</th>



</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php
// $get_avg="SELECT AVG(qty) as 'Averageqty' FROM pending_orders WHERE order_status='Complete' AND order_date >= CURRENT_TIMESTAMP -30";
// // $get_avg = "SELECT AVG(qty) as 'Averageqty' FROM pending_orders;";

// $run_avg = mysqli_query($con,$get_avg);
// $row_avg = mysqli_fetch_array($run_avg);
// $avg_quantity = $row_avg['Averageqty'];
$quantity_avg=0;
$get_avg = "SELECT SUM(qty) FROM pending_orders WHERE order_status='Complete' AND order_date >= (DATE(NOW()) - INTERVAL 30 DAY) GROUP BY food_id;";

$run_avg = mysqli_query($con,$get_avg);

$count=mysqli_num_rows($run_avg);
while ($row_avg = mysqli_fetch_array($run_avg)) {
    $quantity_avg += $row_avg['SUM(qty)'];

}
$avg_quantity=$quantity_avg/$count;

$i=0;
$get_orders = "SELECT food_id, SUM(qty) FROM pending_orders WHERE order_status='Complete' AND order_date >= (DATE(NOW()) - INTERVAL 30 DAY) GROUP BY food_id;";

$run_orders = mysqli_query($con,$get_orders);


while ($row_orders = mysqli_fetch_array($run_orders)) {

$food_id = $row_orders['food_id'];

$quantity = $row_orders['SUM(qty)'];

$get_foods = "select title,price from food where id='$food_id'";

$run_foods = mysqli_query($con,$get_foods);

$row_foods = mysqli_fetch_array($run_foods);

$food_title = $row_foods['title'];
$food_price = $row_foods['price'];

$total_price=$quantity*$food_price;

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td>
<?php echo $food_title; ?>
 </td>


<td>
    <?php
if($quantity>$avg_quantity+2)
echo  round(($quantity+$avg_quantity)/2);
else if($quantity>$avg_quantity)
echo round(($quantity+$avg_quantity)/2);
else if($quantity<$avg_quantity)
if($avg_quantity-2<=0)
echo "1";
else
echo round($quantity);
?>
</td>

<td>Rs.<?php echo $total_price; ?></td>




<td>
<?php
if($quantity>$avg_quantity+3)
echo "Highly Demanded";
else if($quantity>$avg_quantity)
echo "Regular Demanded";
else if($quantity<$avg_quantity-2)
echo "Low Demanded";

?>


</td>


</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>