<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<?php

$get_banner = "select * from banner";

$run_banner = mysqli_query($con,$get_banner);

$row_banner = mysqli_fetch_array($run_banner);
$run_banner = mysqli_query($con,$get_banner);
$banner_food_id=$row_banner['food_id'];
$banner_line_1 = $row_banner['line_1'];

$banner_line_2 = $row_banner['line_2'];

$banner_line_3 = $row_banner['line_3'];

$old_banner_image = $row_banner['image'];

$banner_active = $row_banner['active'];
$get_banner2 = "select * from food where id='$banner_food_id' AND active='yes'";

$run_banner2 = mysqli_query($con,$get_banner2);

$row_banner2 = mysqli_fetch_array($run_banner2);
$banner_food_id = $row_banner2['id'];
$banner_food_title = $row_banner2['title'];

?>



<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit Banner Us

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Banner Us  

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post"  enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Banner Line 1 </label>

<div class="col-md-6">

<input type="text" name="banner_line_1" class="form-control" value="<?php echo $banner_line_1; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Banner Line 2: </label>

<div class="col-md-6">

<input type="text" name="banner_line_2" class="form-control" value="<?php echo $banner_line_2; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Banner Line 3: </label>

<div class="col-md-6">

<input type="text" name="banner_line_3" class="form-control" value="<?php echo $banner_line_3; ?>">

</div>

</div><!-- form-group Ends -->
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Select Food Combo</label>

<div class="col-md-6" >

<select class="form-control" name="food"><!-- select food Starts -->

<option value="<?php echo $banner_food_id; ?>">
<?php echo $banner_food_title; ?>
</option>

<?php


$get_p_cats = "select * from food";

$run_p_cats = mysqli_query($con,$get_p_cats);

while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

$p_cat_id = $row_p_cats['id'];

$p_cat_title = $row_p_cats['title'];

echo "<option value='$p_cat_id' >$p_cat_title</option>";

}

?>

</select><!-- select chef Ends -->
</div>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Select Banner Image </label>

<div class="col-md-6">

<input type="file" name="banner_image" class="form-control" >

<br>

<img src="other_images/<?php echo $old_banner_image; ?>" width="120" height="70">
<br>

<p style="font-size:15px; font-weight:bold;">

Upload Picture of 1300 x 520 px

</p>
</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Active </label>

<div class="col-md-6">

<input type="radio" name="banner_active" value="yes" 
<?php if($banner_active == 'no'){}else{ echo "checked='checked'"; } ?> >

<label> Yes </label>

<input type="radio" name="banner_active" value="no" 
<?php if($banner_active == 'no'){ echo "checked='checked'"; }else{} ?> >

<label> No </label>

</div>

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="submit" class="btn btn-primary form-control" value=" Update Banner Us ">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php

if(isset($_POST['submit'])){

$banner_line_1 = $_POST['banner_line_1'];

$banner_line_2 = $_POST['banner_line_2'];

$banner_line_3 = $_POST['banner_line_3'];
$banner_food_id=$_POST['food'];


$banner_active = $_POST['banner_active'];
$banner_image = $_FILES['banner_image']['name'];
if(isset($_FILES['banner_image']['name']) && !empty($banner_image))
                {
                    // $cat_image = $_FILES['cat_image']['name'];
                  $ext = end(explode('.', $banner_image));
                  $$banner_image = "Banner-" . rand(0000, 9999) . '.' . $ext;
                  $temp_name = $_FILES['banner_image']['tmp_name'];
                  $upload=move_uploaded_file($temp_name,"other_images/$banner_image");
                  if($upload==false){
    
                    echo "<script>alert('Failed to upload Image')</script>";
                    
                    echo "<script>window.open('index.php?edit_banner','_self')</script>";
                    
                    }
                }
                if(empty($banner_image)){

                    $banner_image= $old_banner_image;
                    
                    }


$update_banner = "update banner set food_id='$banner_food_id',line_1='$banner_line_1',line_2='$banner_line_2',line_3='$banner_line_3',image='$banner_image',active='$banner_active' ";

$run_banner = mysqli_query($con,$update_banner);

if($run_banner){

echo "<script>alert('Banner Us Page Has Been Updated')</script>";

echo "<script>window.open('index.php?dashboard','_self')</script>";

}

}

?>


<?php } ?>