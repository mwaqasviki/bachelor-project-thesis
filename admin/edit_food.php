<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_food'])){

$edit_id = $_GET['edit_food'];

$get_p = "select * from food where id='$edit_id'";

$run_edit = mysqli_query($con,$get_p);

$row_edit = mysqli_fetch_array($run_edit);

$f_id = $row_edit['id'];

$f_title = $row_edit['title'];

$f_cat = $row_edit['category_id'];

$cook_id = $row_edit['cook_id'];

$p_image1 = $row_edit['image'];

$new_p_image1 = $row_edit['image'];


$f_price = $row_edit['price'];

$f_desc = $row_edit['description'];

$special = $row_edit['special'];

$featured = $row_edit['featured'];

$active = $row_edit['active'];

}

$get_manufacturer = "select * from chef where chef_id='$cook_id'";

$run_manufacturer = mysqli_query($con,$get_manufacturer);

$row_manfacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_id = $row_manfacturer['chef_id'];

$manufacturer_title = $row_manfacturer['chef_title'];


$get_p_cat = "select * from category where id='$f_cat'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['title'];



?>


<!DOCTYPE html>

<html>

<head>

<title> Edit foods </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#food_desc,#food_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit foods

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit foods

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Title </label>

<div class="col-md-6" >

<input type="text" name="food_title" class="form-control" required value="<?php echo $f_title; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Select A Cook </label>

<div class="col-md-6" >

<select class="form-control" name="chef"><!-- select chef Starts -->

<option value="<?php echo $manufacturer_id; ?>">
<?php echo $manufacturer_title; ?>
</option>

<?php

$get_chef = "select * from chef";
$run_chef = mysqli_query($con,$get_chef);
while($row_chef= mysqli_fetch_array($run_chef)){
$chef_id = $row_chef['chef_id'];
$chef_title = $row_chef['chef_title'];

echo "<option value='$chef_id'>
$chef_title
</option>";

}

?>

</select><!-- select chef Ends -->
</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Category </label>

<div class="col-md-6" >

<select name="food_cat" class="form-control" >

<option value="<?php echo $f_cat; ?>" > <?php echo $p_cat_title; ?> </option>


<?php

$get_p_cats = "select * from category";

$run_p_cats = mysqli_query($con,$get_p_cats);

while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

$p_cat_id = $row_p_cats['id'];

$p_cat_title = $row_p_cats['title'];

echo "<option value='$p_cat_id' >$p_cat_title</option>";

}


?>


</select>

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Image</label>

<div class="col-md-6" >

<input type="file" name="food_img1" class="form-control" >
<br><img src="food_images/<?php echo $p_image1; ?>" width="70" height="70" >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Price </label>

<div class="col-md-6" >

<input type="text" name="food_price" class="form-control" required value="<?php echo $f_price; ?>" >

</div>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Special </label>

<div class="col-md-6">

<input type="radio" name="special" value="yes" 
<?php if($special == 'no'){}else{ echo "checked='checked'"; } ?> >

<label> Yes </label>

<input type="radio" name="special" value="no" 
<?php if($special == 'no'){ echo "checked='checked'"; }else{} ?> >

<label> No </label>

</div>

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Featured </label>

<div class="col-md-6">

<input type="radio" name="featured" value="yes" 
<?php if($featured == 'no'){}else{ echo "checked='checked'"; } ?> >

<label> Yes </label>

<input type="radio" name="featured" value="no" 
<?php if($featured == 'no'){ echo "checked='checked'"; }else{} ?> >

<label> No </label>

</div>

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Active </label>

<div class="col-md-6">

<input type="radio" name="active" value="yes" 
<?php if($active == 'no'){}else{ echo "checked='checked'"; } ?> >

<label> Yes </label>

<input type="radio" name="active" value="no" 
<?php if($active == 'no'){ echo "checked='checked'"; }else{} ?> >

<label> No </label>

</div>

</div><!-- form-group Ends -->
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Description </label>

<div class="col-md-6" >



<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

<br>

<textarea name="food_desc" class="form-control" rows="15" id="food_desc">
<?php echo $f_desc; ?>

</textarea>

</div>
</div>
</div>
</div><!-- description tab-pane fade in active Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update food" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['update'])){

  $food_title = $_POST['food_title'];
  $food_cat = $_POST['food_cat'];
  $chef_id = $_POST['chef'];
  $food_price = $_POST['food_price'];
  $food_desc = $_POST['food_desc'];
  $food_sp=$_POST['special'];
  $featured=$_POST['featured'];
  $active=$_POST['active'];
  
  
  
  

  $food_img1 = $_FILES['food_img1']['name'];
  if(isset($_FILES['food_img1']['name']) && !empty($food_img1))
            {
              // $food_img1 = $_FILES['food_img1']['name'];
              $ext = end(explode('.', $food_img1));
              $food_img1 = "Food-Name-" . rand(0000, 9999) . '.' . $ext;
              $temp_name1 = $_FILES['food_img1']['tmp_name'];
              $upload=move_uploaded_file($temp_name1,"food_images/$food_img1");
              if($upload==false){

                echo "<script>alert('Failed to upload Image')</script>";
                
                echo "<script>window.open('index.php?view_foods','_self')</script>";
                
                }
            }

// $food_img1 = $_FILES['food_img1']['name'];


// $temp_name1 = $_FILES['food_img1']['tmp_name'];


if(empty($food_img1)){

$food_img1 = $new_p_image1;

}




move_uploaded_file($temp_name1,"food_images/$food_img1");

$update_food = "update food set title='$food_title',description='$food_desc',price='$food_price',image='$food_img1',category_id='$food_cat',special='$food_sp',recommend='$featured',featured='$featured',active='$active',cook_id='$chef_id'  where id='$f_id'";

$run_food = mysqli_query($con,$update_food);

if($run_food){

echo "<script> alert('Food has been updated successfully') </script>";

echo "<script>window.open('index.php?view_foods','_self')</script>";

}

}

?>

<?php } ?>
