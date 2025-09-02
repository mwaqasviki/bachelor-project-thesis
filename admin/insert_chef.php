<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Insert Chef

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> Insert Chef

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Chef Name </label>

<div class="col-md-6">

<input type="text" name="chef_name" class="form-control" >

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Show as Top Chefs </label>

<div class="col-md-6">

<input type="radio" name="chef_top" value="yes" >

<label> Yes </label>

<input type="radio" name="chef_top" value="no" >

<label> No </label>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Select chef Image </label>

<div class="col-md-6">

<input type="file" name="chef_image" class="form-control" >

</div>

</div><!-- form-group Ends -->
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Description </label>

<div class="col-md-6" >



<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

<br>

<textarea name="chef_desc" class="form-control" rows="7" id="chef_desc">


</textarea>

</div>
</div>
</div>
</div><!-- description tab-pane fade in active Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="submit" class="form-control btn btn-primary" value=" Insert chef " >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$chef_name = $_POST['chef_name'];
$chef_desc = $_POST['chef_desc'];

$chef_top = $_POST['chef_top'];

if(isset($_FILES['chef_image']['name']))
            {
                $chef_image = $_FILES['chef_image']['name'];
              $ext = end(explode('.', $chef_image));
              $chef_image = "Chef-Name-" . rand(0000, 9999) . '.' . $ext;
              $tmp_name = $_FILES['chef_image']['tmp_name'];
              $upload=move_uploaded_file($tmp_name,"other_images/$chef_image");
              if($upload==false){

                echo "<script>alert('Failed to upload Image')</script>";
                
                echo "<script>window.open('index.php?insert_chef','_self')</script>";
                
                }
            }

// $chef_image = $_FILES['chef_image']['name'];

// $tmp_name = $_FILES['chef_image']['tmp_name'];

// move_uploaded_file($tmp_name,"other_images/$chef_image");

$insert_chef = "insert into chef (chef_title,chef_des,chef_image,featured) values ('$chef_name','$chef_desc','$chef_image','$chef_top')";

$run_chef = mysqli_query($con,$insert_chef);

if($run_chef){

echo "<script>alert('New chef Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_chefs','_self')</script>";

}

}

?>

<?php } ?>