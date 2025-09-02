<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Hot Deals

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> View Hot Deals

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>#</th>
<th>Deal Title</th>
<th>Edit</th>



</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php 

$i=0;

$get_deals = "select * from hot_deal";

$run_deals = mysqli_query($con,$get_deals);

while($row_deals = mysqli_fetch_array($run_deals)){

$deal_id = $row_deals['id'];

$deal_title = $row_deals['title'];


$i++;



?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $deal_title; ?></td>




<td>

<a href="index.php?edit_hotdeals=<?php echo $deal_id; ?>" >

<i class="fa fa-pencil" ></i> Edit

</a>

</td>

</tr>


<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table-bordered table-hover table-striped Ends -->


</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>