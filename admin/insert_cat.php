<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Insert Category

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Insert Category

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Category Title</label>

<div class="col-md-6">

<input type="text" name="cat_title" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Show as Category Featured</label>

<div class="col-md-6">

<input type="radio" name="featured" value="yes">

<label>Yes</label>

<input type="radio" name="featured" value="no">

<label>No</label>

</div>

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Show as Category Active</label>

<div class="col-md-6">

<input type="radio" name="active" value="yes">

<label>Yes</label>

<input type="radio" name="active" value="no">

<label>No</label>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Select Category Image</label>

<div class="col-md-6">

<input type="file" name="cat_image" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="submit" value="Insert Category" class="btn btn-primary form-control">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$cat_title = $_POST['cat_title'];

$cat_featured = $_POST['featured'];
$cat_active = $_POST['active'];

    if(isset($_FILES['cat_image']['name']))
                {
                  $cat_image = $_FILES['cat_image']['name'];
                  $ext = end(explode('.', $cat_image));
                  $cat_image = "Cat-Name-" . rand(0000, 9999) . '.' . $ext;
                  $tmp_name = $_FILES['cat_image']['tmp_name'];
                  $upload=move_uploaded_file($tmp_name,"other_images/$cat_image");
                  if($upload==false){
    
                    echo "<script>alert('Failed to upload Image')</script>";
                    
                    echo "<script>window.open('index.php?insert_cat','_self')</script>";
                    
                    }
                }
// $cat_image = $_FILES['cat_image']['name'];

// $temp_name = $_FILES['cat_image']['tmp_name'];

// move_uploaded_file($temp_name,"other_images/$cat_image");

$insert_cat = "insert into category (title,image,featured,active) values ('$cat_title','$cat_image','$cat_featured','$cat_active')";

$run_cat = mysqli_query($con,$insert_cat);

if($run_cat){

echo "<script> alert('New Category Has Been Inserted')</script>";

echo "<script> window.open('index.php?insert_cat','_self') </script>";

}

}

}

?>