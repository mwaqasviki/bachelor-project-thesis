<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

  <script>tinymce.init({ selector:'#about_desc' });</script>
  
<?php

$get_about_us = "select * from about_us";

$run_about_us = mysqli_query($con,$get_about_us);

$row_about_us = mysqli_fetch_array($run_about_us);

$about_desc = $row_about_us['about_desc'];

$about_who = $row_about_us['about_who'];

$about_intouch = $row_about_us['about_intouch'];

?> 

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit About Us Page

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit About Us Page

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" class="form-horizontal"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> About Us desc : </label>

<div class="col-md-8">
<textarea name="about_desc" class="form-control" rows="5">

<?php echo $about_desc; ?>

</textarea>

<!-- <input type="text" name="about_desc" class="form-control" value="<?php echo $about_desc; ?>"> -->

</div>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> About Us Who Are We? : </label>

<div class="col-md-8">

<textarea name="about_who" class="form-control" rows="5">

<?php echo $about_who; ?>

</textarea>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> About Us Get In Touch : </label>

<div class="col-md-8">

<textarea name="about_intouch" id="about_desc" class="form-control" rows="10">

<?php echo $about_intouch; ?>

</textarea>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-8">

<input type="submit" name="submit" value="Update About Us Page" class="btn btn-primary form-control">

</div>

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$about_desc = $_POST['about_desc'];

$about_who = $_POST['about_who'];

$about_intouch = $_POST['about_intouch'];

$update_about_us = "update about_us set about_desc='$about_desc',about_who='$about_who',about_intouch='$about_intouch'";

$run_about_us = mysqli_query($con,$update_about_us);

if($run_about_us){

echo "<script>alert('About Us Page Has Been Updated')</script>";

echo "<script>window.open('index.php?dashboard','_self')</script>";

}

}

?>


<?php } ?>