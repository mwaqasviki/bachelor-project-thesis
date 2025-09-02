<?php include("includes/header.php"); ?>
    <!--Page header & Title-->

    <?php

$ip_add = getRealUserIp();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

$count = mysqli_num_rows($run_cart);



?>
    <div id="page_header">
      <div class="page_title">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title">Your &nbsp; Cart</h2>
              <p>
                Check out our menu and some of our special, featured recipies!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="shopping-cart-container pdsection">

      <div class="products-container">
        <h3 class="title">Your Meals</h3>

        <div class="box-container">

<?php
if($count==0)
{

echo "<div class='' style='text-align: center;'>
<h3>No Items in the Cart</h3>
</div>";

}
else{
$total = 0;
        while($row_cart = mysqli_fetch_array($run_cart)){

$f_id = $row_cart['food_id'];

$qty = $row_cart['qty'];

$only_price = $row_cart['food_price'];

$get_food = "select * from food where id='$f_id'";

$run_food = mysqli_query($con,$get_food);

while($row_food = mysqli_fetch_array($run_food)){

$food_title = $row_food['title'];

$food_image = $row_food['image'];

$sub_total = $only_price*$qty;

$_SESSION['pro_qty'] = $qty;

$total += $sub_total;


?>

          <div class="box">
            <i class="fa fa-times close-btn"></i>
            <img src="admin/food_images/<?php echo $food_image; ?>" alt="" />
            <div class="content">
              <h3><?php echo $food_title; ?></h3>
              <span> Quantity : </span>
              <input type="number" name="quantity"  value="<?php echo $_SESSION['pro_qty']; ?>" id="<?php echo $f_id; ?>" class="quantity" onkeyup= "search(this)" onchange= "search(this)" min="1" />
              <br/>
              <span> Price : </span>
              <span class="price">Rs.<?php echo $only_price; ?>.00 </span>
            </div>
          </div>
<?php
 } 
}

?>
        

         

     
        </div>
      </div>

      <div class="cart-total">
        <h3 class="title">Cart Total</h3>

        <div class="box"><h3 class="subtotal">Total Items : <span class="span_items"><?php echo $count; ?></span></h3>
          <h3 class="subtotal">subtotal : <span class="price2"><?php echo $total; ?></span></h3>
          <h3 class="total">total : <span class="price2" ><?php echo $total; ?></span></h3>

          <a href="loginSignup.php" class="btn">proceed to checkout</a>
        </div>
      </div>
      <?php
}
      ?>
    </section>
    <script src="js/jquery.min.js"> </script>
<script>

var closebtn=document.querySelectorAll(".close-btn");
for(let i=0; i<closebtn.length;i++)
{
closebtn[i].addEventListener('click',close_btn);

function close_btn(){
    var f_id=document.querySelectorAll(".quantity");
    var box=document.querySelectorAll(".box");
    // console.log(qt[i].id);
    box[i].classList.add('hidden');
    $.ajax({

url:"remove_cart.php",

method:"POST",

data:{id:f_id[i].id},

success:function(data){
    console.log(data);
    let price_count=data.split(',');
    let price=price_count[0];
    let count=price_count[1];
    $(".price2").text(price);
    document.querySelector(".item_cart").innerHTML =
            "<i id='cart-btn' class='fa fa-shopping-cart fa-1.5x'></i> &nbsp;" +
            count +
            "&nbsp; Items";
            document.querySelector(".span_items").textContent=count;
//  $("body").load('cart.php');

}




});


}
}

function search(qty){
    var quantity=qty.value;
    var id = qty.id;
    console.log(id+"and"+quantity);
    if(quantity  != ''){
        $.ajax({

url:"change.php",

method:"POST",

data:{id:id, quantity:quantity},

success:function(data){
    console.log(data);
    $(".price2").text(data);
//  $("body").load('cart.php');

}




});


}


}


</script>
    <?php include 'includes/footer.php'; ?>