<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<?php
if(isset($_GET['edit_hotdeals'])){

    $edit_id = $_GET['edit_hotdeals'];

$get_deal = "select * from hot_deal where id ='$edit_id'";

$run_deal = mysqli_query($con,$get_deal);

$row_deal = mysqli_fetch_array($run_deal);
$run_deal = mysqli_query($con,$get_deal);
$deal_food_id=$row_deal['food_id'];
$deal_title = $row_deal['title'];

$deal_desc = $row_deal['description'];


$old_deal_image = $row_deal['image'];

$get_deal2 = "select * from food where id='$deal_food_id'";

$run_deal2 = mysqli_query($con,$get_deal2);

$row_deal2 = mysqli_fetch_array($run_deal2);
$deal_food_id = $row_deal2['id'];
$deal_food_title = $row_deal2['title'];

?>



<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit Deal

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Deal 

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post"  enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Deal Offer Name</label>

<div class="col-md-6">

<input type="text" name="deal_title" class="form-control" value="<?php echo $deal_title; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Deal Offer</label>

<div class="col-md-6">

<input type="text" name="deal_desc" class="form-control" value="<?php echo $deal_desc; ?>">

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Select Food Combo</label>

<div class="col-md-6" >

<select class="form-control" name="food"><!-- select food Starts -->

<option value="<?php echo $deal_food_id; ?>">
<?php echo $deal_food_title; ?>
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

<label class="col-md-3 control-label"> Select Deal Image </label>

<div class="col-md-6">

<input type="file" name="deal_image" class="form-control" >

<br>

<img src="other_images/<?php echo $old_deal_image; ?>" width="70" height="70">
<br>

</div>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="submit" class="btn btn-primary form-control" value=" Update Deal ">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php

if(isset($_POST['submit'])){

$deal_title = $_POST['deal_title'];

$deal_desc = $_POST['deal_desc'];

$deal_food_id=$_POST['food'];


$deal_image = $_FILES['deal_image']['name'];
if(isset($_FILES['deal_image']['name']) && !empty($deal_image))
                {
                    // $cat_image = $_FILES['cat_image']['name'];
                  $ext = end(explode('.', $deal_image));
                  $$deal_image = "Deal-" . rand(0000, 9999) . '.' . $ext;
                  $temp_name = $_FILES['deal_image']['tmp_name'];
                  $upload=move_uploaded_file($temp_name,"other_images/$deal_image");
                  if($upload==false){
    
                    echo "<script>alert('Failed to upload Image')</script>";
                    
                    echo "<script>window.open('index.php?edit_deal','_self')</script>";
                    
                    }
                }
                if(empty($deal_image)){

                    $deal_image= $old_deal_image;
                    
                    }


$update_deal = "update hot_deal set food_id='$deal_food_id',title='$deal_title',description='$deal_desc',image='$deal_image' Where id='$edit_id'";

$run_deal = mysqli_query($con,$update_deal);

if($run_deal){

echo "<script>alert('Deal Us Page Has Been Updated')</script>";

echo "<script>window.open('index.php?view_hotdeals','_self')</script>";

}

}

}
}
?>