<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert Food </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#food_desc,#food_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Insert Food

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Insert Food

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Title </label>

<div class="col-md-6" >

<input type="text" name="food_title" class="form-control" required >

</div>

</div><!-- form-group Ends -->




<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Select A Cook </label>

<div class="col-md-6" >

<select class="form-control" name="chef"><!-- select chef Starts -->

<option> Select A Cook </option>

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

<option> Select  a Food Category </option>


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

<input type="file" name="food_img1" class="form-control" required >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Food Price </label>

<div class="col-md-6" >

<input type="text" name="food_price" class="form-control" required >

</div>

</div><!-- form-group Ends -->






<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Special </label>

<div class="col-md-6">

<input type="radio" name="special" value="yes" >

<label> Yes </label>

<input type="radio" name="special" value="no" >

<label> No </label>

</div>

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Featured </label>

<div class="col-md-6">

<input type="radio" name="featured" value="yes" >

<label> Yes </label>

<input type="radio" name="featured" value="no" >

<label> No </label>

</div>

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Active </label>

<div class="col-md-6">

<input type="radio" name="active" value="yes" >

<label> Yes </label>

<input type="radio" name="active" value="no" >

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


</textarea>

</div>
</div>
</div>
</div><!-- description tab-pane fade in active Ends -->

<div class="form-group " style="margin-top:20px"><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Insert food" class="btn btn-primary form-control" >

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

if(isset($_POST['submit'])){

$food_title = $_POST['food_title'];
$food_cat = $_POST['food_cat'];
$chef_id = $_POST['chef'];
$food_price = $_POST['food_price'];
$food_desc = $_POST['food_desc'];
$food_sp=$_POST['special'];
$featured=$_POST['featured'];
$active=$_POST['active'];





$status = "food";
if(isset($_FILES['food_img1']['name']))
            {
              $food_img1 = $_FILES['food_img1']['name'];
              $ext = end(explode('.', $food_img1));
              $food_img1 = "Food-Name-" . rand(0000, 9999) . '.' . $ext;
              $temp_name1 = $_FILES['food_img1']['tmp_name'];
              $upload=move_uploaded_file($temp_name1,"food_images/$food_img1");
              if($upload==false){

                echo "<script>alert('Failed to upload Image')</script>";
                
                echo "<script>window.open('index.php?insert_food','_self')</script>";
                
                }
            }
// $food_img1 = $_FILES['food_img1']['name'];





$insert_food = "insert into food (title,description,price,image,category_id,special,recommend,featured,active,cook_id) 
values ('$food_title','$food_desc','$food_price','$food_img1','$food_cat','$food_sp','$featured','$featured','$active','$chef_id')";

$run_food = mysqli_query($con,$insert_food);

if($run_food){

echo "<script>alert('Food has been inserted successfully')</script>";

echo "<script>window.open('index.php?view_foods','_self')</script>";

}

}

?>

<?php } ?>
