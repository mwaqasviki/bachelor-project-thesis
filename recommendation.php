<?php include("includes/header.php"); ?>
    <!--Page header & Title-->

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
    <div id="page_header">
      <div class="page_title">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title">Recommended &nbsp Foods</h2>
              <p>
                Check out our menu and some of our special, featured recipies!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- recommendations -->

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
     
      if(isset($_SESSION['customer_id']))
      {
        $c_id=$_SESSION['customer_id'];
      $get_orders = "SELECT food_id,SUM(qty) FROM pending_orders WHERE customer_id=$c_id AND order_status='Complete' AND order_date >= (DATE(NOW()) - INTERVAL 30 DAY) GROUP BY food_id ORDER BY SUM(qty) DESC LIMIT 6;";

      $run_orders = mysqli_query($con,$get_orders);
      $countsp=mysqli_num_rows($run_orders);
      if($countsp>0){
      
      while ($row_orders = mysqli_fetch_array($run_orders)) {
      
        $fsp_id = $row_orders['food_id'];
        $fsp_qty = $row_orders['SUM(qty)'];
        $query_foodsp = "SELECT * from food WHERE id=$fsp_id";
        $run_foodsp = mysqli_query($con,$query_foodsp);
        $row_foodsp = mysqli_fetch_array($run_foodsp);

        $fsp_id2=$row_foodsp['id'];
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
<input type="hidden" class="f_id" value="<?php echo $fsp_id2; ?>" />
            <button href="#"  class="btn f_price" value="<?php echo $fsp_price; ?>">Add to Cart</button>
          </div>
        </div>
        <?php
        }


      }
      
      
    }else{


   
$query_foodsp = "select * from food where active='yes' ";

$run_foodsp = mysqli_query($con,$query_foodsp);

$countsp=mysqli_num_rows($run_foodsp);
if($countsp>0){

while($row_foodsp=mysqli_fetch_assoc($run_foodsp))
{

  $fsp_id2 = $row_orders['food_id'];

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
            <h3><?php echo $fsp_title; ?>"</h3>
           
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
<input type="hidden" class="f_id" value="<?php echo $fsp_id2; ?>" />
            <button href="#"  class="btn f_price" value="<?php echo $fsp_price; ?>">Add to Cart</button>
          </div>
        </div>
<?php 
}
}
}
?>


        <!-- <div class="box">
          <a href="#" class="fa fa-heart"></a>
          <div class="images">
            <img src="images/food-2.png" alt="" />
          </div>
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="stars">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-alt"></i>
              <span> (50) </span>
            </div>
            <div class="price">$40.00 <span>$50.00</span></div>
            <a href="#" class="btn">add to cart</a>
          </div>
        </div>

        <div class="box">
          <a href="#" class="fa fa-heart"></a>
          <div class="images">
            <img src="images/food-3.png" alt="" />
          </div>
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="stars">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-alt"></i>
              <span> 50 </span>
            </div>
            <div class="price">$40.00 <span>$50.00</span></div>
            <a href="#" class="btn">add to cart</a>
          </div>
        </div>

        <div class="box">
          <a href="#" class="fa fa-heart"></a>
          <div class="images">
            <img src="images/food-4.png" alt="" />
          </div>
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="stars">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-alt"></i>
              <span> (50) </span>
            </div>
            <div class="price">$40.00 <span>$50.00</span></div>
            <a href="#" class="btn">add to cart</a>
          </div>
        </div>

        <div class="box">
          <a href="#" class="fa fa-heart"></a>
          <div class="images">
            <img src="images/food-5.png" alt="" />
          </div>
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="stars">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-alt"></i>
              <span> (50) </span>
            </div>
            <div class="price">$40.00 <span>$50.00</span></div>
            <a href="#" class="btn">add to cart</a>
          </div>
        </div>

        <div class="box">
          <a href="#" class="fa fa-heart"></a>
          <div class="images">
            <img src="images/food-6.png" alt="" />
          </div>
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="stars">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-alt"></i>
              <span> (50) </span>
            </div>
            <div class="price">$40.00 <span>$50.00</span></div>
            <a href="#" class="btn">add to cart</a>
          </div>
        </div>

        <div class="box">
          <a href="#" class="fa fa-heart"></a>
          <div class="images">
            <img src="images/food-7.png" alt="" />
          </div>
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="stars">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-alt"></i>
              <span> (50) </span>
            </div>
            <div class="price">$40.00 <span>$50.00</span></div>
            <a href="#" class="btn">add to cart</a>
          </div>
        </div>

        <div class="box">
          <a href="#" class="fa fa-heart"></a>
          <div class="images">
            <img src="images/food-8.png" alt="" />
          </div>
          <div class="content">
            <h3>Delicious Food</h3>
            <div class="stars">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-alt"></i>
              <span> (50) </span>
            </div>
            <div class="price">$40.00 <span>$50.00</span></div>
            <a href="#" class="btn">add to cart</a>
          </div>
        </div>-->
      </div>
    </section>
    <?php include 'includes/footer.php'; ?>
    <script src="js/addtocart.js"></script>