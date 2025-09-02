<?php include("includes/header.php");
include("includes/db.php"); 

$query_cat = "select * from category where active='yes'";

$run_cat = mysqli_query($con,$query_cat);




?>
<style>

  /* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  display:inline-block;
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  
  display:inline-block;
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:1.5em; /* Change the size of the stars */
  color:#ccc !important; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36 !important;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C !important;
}

.text-center {text-align:center;}



.success-box {
  margin:50px 0;
  padding:10px 10px;
  border:1px solid #eee;
  background:#f9f9f9;
}

.success-box img {
  margin-right:10px;
  display:inline-block;
  vertical-align:top;
}

.success-box > div {
  vertical-align:top;
  display:inline-block;
  color:#888;
}

</style>
    <!--Page header & Title-->
    <div id="page_header">
      <div class="page_title">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title">Our Food</h2>
              <p>
                Check out our menu and some of our special, featured recipies!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Welcome-->
    <div id="welcome" class="padding2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading">Categories</h2>
            <hr class="heading_space" />
          </div>
        </div>
      </div>
    </div>
    <section class="category pdsection">
<?php  
$count=mysqli_num_rows($run_cat);
if($count>0){

while($row_cat=mysqli_fetch_assoc($run_cat))
{
$c_id = $row_cat['id'];

$c_title = $row_cat['title'];



$c_image = $row_cat['image'];

 
 ?>
    
      <button href="#" class="box cat-<?php echo $c_title; ?>  cat-btn active" value="<?php echo $c_title; ?>">
        <img src="admin/other_images/<?php echo $c_image; ?>" alt="" />
        <h3 ><?php echo $c_title; ?></h3>
      </button>
     
      <?php } 
}
else{
  echo "<div class='error'>No Categories Available</div>";
}
      ?>

      <!-- <button href="#" class="box cat-pizza cat-btn">
        <img src="images/cat-2.png" alt="" />
        <h3>Pizza</h3>
      </button>

      <button href="#" class="box cat-burger cat-btn">
        <img src="images/cat-3.png" alt="" />
        <h3>Burger</h3>
      </button>

      <button href="#" class="box cat-chicken cat-btn">
        <img src="images/cat-4.png" alt="" />
        <h3>Chicken</h3>
      </button>

      <button href="#" class="box cat-dinner cat-btn">
        <img src="images/cat-5.png" alt="" />
        <h3>Dinner</h3>
      </button>

      <button href="#" class="box cat-coffee cat-btn">
        <img src="images/cat-6.png" alt="" />
        <h3>Coffee</h3>
      </button>
    </section> -->
    </section>
    <!--Food Facilities-->
    <section class="menu pdsection" id="menu">
      <div class="box-container">

  <?php

$query_food = "select * from food where active='yes'";

$run_food = mysqli_query($con,$query_food);

$count=mysqli_num_rows($run_food);
if($count>0){

while($row_food=mysqli_fetch_assoc($run_food))
{

$f_id = $row_food['id'];

$f_title = $row_food['title'];

$f_cat = $row_food['category_id'];


$f_image1 = $row_food['image'];

$f_price = $row_food['price'];

$query_cat2 = "select * from category where active='yes' AND id='$f_cat'";

$run_cat2 = mysqli_query($con,$query_cat2);
$row_cat2 = mysqli_fetch_array($run_cat2);
$cat_title2 = $row_cat2['title'];




  ?>

    
        <div href="#" class="box C-filter <?php echo $cat_title2; ?>">
          <img src="admin/food_images/<?php echo $f_image1; ?>" alt="" />
          <div class="content">
            <h3><?php echo $f_title; ?></h3>
            <div class="price">Rs. <?php echo $f_price; ?></div>
            <!-- <lable>Quantity : </lable>
              <input style="width:30px;" type="number"  name="" value="1" id="" /> -->
              <input type="hidden" class="f_id" value="<?php echo $f_id; ?>" />
            <button href="#"  class="btn f_price" value="<?php echo $f_price; ?>">Add to Cart</button>
            <!-- <a href="add_cart.php?add_cart=" class="btn">Add to Cart</a> -->
          </div>
        </div>
<?php
// }echo $f_id.'&food_price='.$f_price;

}}
else{
  echo "<div class='error'>No Foods Available</div>";
}
?>

    </section>
    

    <!-- popular section starts  -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="heading">Our Special Dishes</h2>
          <hr class="heading_space" />
        </div>
      </div>
    </div>

    <section class="popular pdsection" id="popular">
      <div class="box-container">

      <?php
$query_foodsp = "select * from food where active='yes' AND special='yes'";

$run_foodsp = mysqli_query($con,$query_foodsp);

$countsp=mysqli_num_rows($run_foodsp);
if($countsp>0){

while($row_foodsp=mysqli_fetch_assoc($run_foodsp))
{

$fsp_id = $row_foodsp['id'];

$fsp_title = $row_foodsp['title'];

$fsp_cat = $row_foodsp['category_id'];


$fsp_image1 = $row_foodsp['image'];

$fsp_price = $row_foodsp['price'];
      ?>
        <div class="box">
          <a href="#" class="fa fa-heart"></a>
          <div class="images">
            <img height="200" width="200" src="admin/food_images/<?php echo $fsp_image1; ?>" alt="" />
          </div>
          <div class="content">
            <h3><?php echo $fsp_title; ?></h3>
           
            <div class="stars">
            <div class='rating-stars text-center'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
    </ul>
    <span> (50) </span>
  </div>
              
            </div>
            <div class="price">Rs. <?php echo $fsp_price; ?> <span>Rs. <?php echo $fsp_price+20; ?></span></div>
            <!-- <lable>Qsuantity : </lable>
              <input style="width:30px;" type="number"  name="" value="1" id="" />
</br> -->
<input type="hidden" class="f_id" value="<?php echo $fsp_id; ?>" />
            <button href="#"  class="btn f_price" value="<?php echo $fsp_price; ?>">Add to Cart</button>
          </div>
        </div>
<?php 
}
}
?>



      </div>
    </section>
    <!-- banner section starts   -->
<?php 
$get_banner = "select * from banner";

$run_banner = mysqli_query($con,$get_banner);

$row_banner = mysqli_fetch_array($run_banner);
$run_banner = mysqli_query($con,$get_banner);
$banner_food_id=$row_banner['food_id'];
$banner_line_1 = $row_banner['line_1'];

$banner_line_2 = $row_banner['line_2'];

$banner_line_3 = $row_banner['line_3'];

$banner_image = $row_banner['image'];
?>
    <section class="banner pdsection">
      <div class="row-banner" >
        <img height="500" width="1030" src="admin/other_images/<?php echo $banner_image; ?>" alt=" NO Image Available" />

        <div class="content">
          <?php echo "
          <span>$banner_line_1</span>
          <h3>$banner_line_2</h3>
          <p>$banner_line_3</p>
          <a href='#' class='btn'>Order Now</a>
          " ?>
        </div>
      </div>

      <div class="grid-banner">
      
      <?php
  $get_deal = "select * from hot_deal";

  $run_deal = mysqli_query($con,$get_deal);
  
  $row_deal = mysqli_fetch_array($run_deal);
  $run_deal = mysqli_query($con,$get_deal);
  $countdeal=mysqli_num_rows($run_deal);
if($countdeal>0){

while($row_deal=mysqli_fetch_assoc($run_deal))
{
  $deal_food_id=$row_deal['food_id'];
  $deal_title = $row_deal['title'];
  
  $deal_desc = $row_deal['description'];
  
  
  $old_deal_image = $row_deal['image'];
      ?>
        <div class="grid">
          <img src="admin/other_images/<?php echo $old_deal_image; ?>" alt="" />
          <div class="content">
            <span><?php echo $deal_title; ?></span>
            <h3><?php echo $deal_desc; ?></h3>
            <a href="#" class="btn">Order now</a>
          </div>
          </div>
        <?php  } } ?>
        
      </div>
    </section>
   

    <!-- menu section starts  -->
   <!-- <div class="container padding2">
      <div class="row">
        <div class="col-md-12">
          <h2 class="heading">Our Special Dishes</h2>
          <hr class="heading_space" />
        </div>
      </div>
    </div>
     <section class="menu pdsection" id="menu">
      <div class="box-container">
        <a href="#" class="box">
          <img src="images/menu-1.png" alt="" />
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="price">$40.00</div>
          </div>
        </a>

        <a href="#" class="box">
          <img src="images/menu-2.png" alt="" />
          <div class="content">
            <h3>Delicious food</h3>
            <div class="price">$40.00</div>
          </div>
        </a>

        <a href="#" class="box">
          <img src="images/menu-3.png" alt="" />
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="price">$40.00</div>
          </div>
        </a>

        <a href="#" class="box">
          <img src="images/menu-4.png" alt="" />
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="price">$40.00</div>
          </div>
        </a>

        <a href="#" class="box">
          <img src="images/menu-5.png" alt="" />
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="price">$40.00</div>
          </div>
        </a>

        <a href="#" class="box">
          <img src="images/menu-6.png" alt="" />
          <div class="content">
            <h3>delicious food</h3>
            <div class="price">$40.00</div>
          </div>
        </a>
      </div>
    </section> -->
    
   <?php include 'includes/footer.php'; ?>
   <script src="js/rating.js"></script>
   <script src="js/Categoryselecter.js"></script>
   <script src="js/addtocart.js"></script>