<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Admin Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_foods" >

<i class="fa fa-fw fa-envelope" ></i> foods 

<span class="badge" ><?php echo $count_foods; ?></span>


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_customers" >

<i class="fa fa-fw fa-gear" ></i> Customers

<span class="badge" ><?php echo $count_customers; ?></span>


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_p_cats" >

<i class="fa fa-fw fa-gear" ></i> food Categories

<span class="badge" ><?php echo $count_p_categories; ?></span>


</a>

</li><!-- li Ends -->

<li class="divider"></li>

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->

<li><!-- foods li Starts -->

<a href="#" data-toggle="collapse" data-target="#foods">

<i class="fa fa-fw fa-table"></i> Manage Foods

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="foods" class="collapse">

<li>
<a href="index.php?insert_food"> Insert foods </a>
</li>

<li>
<a href="index.php?view_foods"> View foods </a>
</li>


</ul>

</li><!-- foods li Ends -->
<!-- Bundles Li Starts --->
<!-- <li>

<a href="#" data-toggle="collapse" data-target="#bundles">

<i class="fa fa-fw fa-edit"></i> Bundles

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="bundles" class="collapse">

<li>
<a href="index.php?insert_bundle"> Insert Bundle </a>
</li>

<li>
<a href="index.php?view_bundles"> View Bundles </a>
</li>

</ul>

</li>Bundles Li Ends - -->
<!-- relations li Starts -->
<!-- 
<li>
    

<a href="#" data-toggle="collapse" data-target="#relations">

<i class="fa fa-fw fa-retweet"></i> Assign foods To Bundles Relations

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="relations" class="collapse">

<li>

<a href="index.php?insert_rel"> Insert Relation </a>

</li>


<li>

<a href="index.php?view_rel"> View Relations </a>

</li>

</ul>


</li> -->
<!-- relations li Ends -->



<li><!-- chef li Starts -->

<a href="#" data-toggle="collapse" data-target="#manufacturers"><!-- anchor Starts -->

<i class="fa fa-fw fa-briefcase"></i> Manage Chefs

<i class="fa fa-fw fa-caret-down"></i>


</a><!-- anchor Ends -->

<ul id="manufacturers" class="collapse"><!-- ul collapse Starts -->

<li>
<a href="index.php?insert_chef"> Insert Chef </a>
</li>

<li>
<a href="index.php?view_chefs"> View Chefs </a>
</li>

</ul><!-- ul collapse Ends -->


</li><!-- chef li Ends -->
<!-- li Starts -->

<!-- <li>

<a href="#" data-toggle="collapse" data-target="#p_cat">

<i class="fa fa-fw fa-pencil"></i> foods Categories

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="p_cat" class="collapse">

<li>
<a href="index.php?insert_p_cat"> Insert food Category </a>
</li>

<li>
<a href="index.php?view_p_cats"> View foods Categories </a>
</li>


</ul>

</li> -->
<!-- li Ends -->


<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#cat">

<i class="fa fa-fw fa-arrows-v"></i> Categories

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="cat" class="collapse">

<li>
<a href="index.php?insert_cat"> Insert Category </a>
</li>

<li>
<a href="index.php?view_cats"> View Categories </a>
</li>


</ul>

</li>






<li><!-- contact us li Starts -->

<!-- <a href="#" data-toggle="collapse" data-target="#contact_us"> -->

<!-- <i class="fa fa-fw fa-pencil"> </i> Edit Contact Us

<i class="fa fa-fw fa-caret-down"></i> -->
<a href="index.php?edit_contact_us">
<i class="fa fa-fw fa-pencil"> </i>


 Edit Contact Us </a>



</li><!-- contact us li Ends -->
<li><!-- about us li Starts -->

<a href="index.php?edit_banner">

<i class="fa fa-fw fa-edit"></i> Edit Banner

</a>

</li><!-- about us li Ends -->
<li><!-- about us li Starts -->

<a href="index.php?edit_about_us">

<i class="fa fa-fw fa-edit"></i> Edit About Us Page

</a>

</li><!-- about us li Ends -->

<li><!-- about us li Starts -->

<a href="index.php?predicted_food">

<i class="fa fa-fw fa-edit"></i> Predicted Food

</a>

</li><!-- about us li Ends -->
<li><!-- about us li Starts -->

<a href="index.php?qrcode">

<i class="fa fa-fw fa-edit"></i> Table QR Code

</a>

</li><!-- about us li Ends -->
<li><!-- about us li Starts -->

<a href="index.php?view_payments">

<i class="fa fa-fw fa-edit"></i> View Payments

</a>

</li><!-- about us li Ends -->
<li><!-- about us li Starts -->

<a href="index.php?view_hotdeals">

<i class="fa fa-fw fa-edit"></i> View/Edit Deals

</a>

</li><!-- about us li Ends -->







<li>

<a href="index.php?view_customers">

<i class="fa fa-fw fa-edit"></i> View Customers

</a>

</li>

<li>

<a href="index.php?view_orders">

<i class="fa fa-fw fa-list"></i> View Orders

</a>

</li>



<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>