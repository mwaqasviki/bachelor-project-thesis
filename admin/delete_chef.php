<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['delete_chef'])){

$delete_id = $_GET['delete_chef'];

$delete_chef = "delete from chef where chef_id='$delete_id'";

$run_chef = mysqli_query($con,$delete_chef);

if($run_chef){

echo "<script>alert('One chef Has Been Deleted')</script>";
echo "<script>window.open('index.php?view_chef','_self')</script>";

}

}


?>


<?php } ?>