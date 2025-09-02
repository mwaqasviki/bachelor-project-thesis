<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['edit_chef'])){

$edit_chef = $_GET['edit_chef'];

$get_chef = "select * from chef where chef_id='$edit_chef'";

$run_chef = mysqli_query($con,$get_chef);

$row_chef = mysqli_fetch_array($run_chef);

$chef_id = $row_chef['chef_id'];

$chef_title = $row_chef['chef_title'];

$chef_desc = $row_chef['chef_des'];
$chef_top = $row_chef['featured'];
$chef_image = $row_chef['chef_image'];

$new_m_image = $row_chef['chef_image'];


}


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Edit chef

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> Edit chef

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> chef Name </label>

<div class="col-md-6">

<input type="text" name="chef_name" class="form-control" value="<?php echo $chef_title; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Show as Top chefs </label>

<div class="col-md-6">

<input type="radio" name="chef_top" value="yes" 
<?php if($chef_top == 'no'){}else{ echo "checked='checked'"; } ?> >

<label> Yes </label>

<input type="radio" name="chef_top" value="no" 
<?php if($chef_top == 'no'){ echo "checked='checked'"; }else{} ?> >

<label> No </label>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Select Chef Image </label>

<div class="col-md-6">

<input type="file" name="chef_image" class="form-control" >

<br>

<img src="other_images/<?php echo $chef_image; ?>" width="70" height="70">

</div>

</div><!-- form-group Ends -->
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Description </label>

<div class="col-md-6" >



<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

<br>

<textarea name="chef_desc" class="form-control" rows="7" id="chef_desc" >
<?php echo $chef_desc; ?>

</textarea>

</div>
</div>
</div>
</div><!-- description tab-pane fade in active Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="update" class="form-control btn btn-primary" value=" Update chef " >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php


if(isset($_POST['update'])){

    $chef_name = $_POST['chef_name'];
    $chef_desc = $_POST['chef_desc'];
    
    $chef_top = $_POST['chef_top'];
    $chef_image = $_FILES['chef_image']['name'];
    if(isset($_FILES['chef_image']['name']) && !empty($chef_image))
                {
                    // $chef_image = $_FILES['chef_image']['name'];
                  $ext = end(explode('.', $chef_image));
                  $chef_image = "Chef-Name-" . rand(0000, 9999) . '.' . $ext;
                  $tmp_name = $_FILES['chef_image']['tmp_name'];
                  $upload=move_uploaded_file($tmp_name,"other_images/$chef_image");
                  if($upload==false){
    
                    echo "<script>alert('Failed to upload Image')</script>";
                    
                    echo "<script>window.open('index.php?edit_chef','_self')</script>";
                    
                    }
                }

// $chef_image = $_FILES['chef_image']['name'];

// $tmp_name = $_FILES['chef_image']['tmp_name'];

// move_uploaded_file($tmp_name,"other_images/$chef_image");

if(empty($chef_image)){

$chef_image = $new_m_image;

}

$update_chef = "update chef set chef_title='$chef_name',chef_des='$chef_desc',chef_image='$chef_image',featured='$chef_top' where chef_id='$chef_id'";

$run_chef = mysqli_query($con,$update_chef);

if($run_chef){

echo "<script>alert('chef Has Been Updated')</script>";

echo "<script>window.open('index.php?view_chefs','_self')</script>";

}

}
}

?>