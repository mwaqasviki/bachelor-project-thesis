

<?php include("includes/header.php");
include("includes/db.php");
$ip_add = getRealUserIp();


$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];



$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);
  if($check_cart == 0)
  {
    echo "<script>window.open('food.php','_self')</script>";
  }
$total=0;
while($row_cart = mysqli_fetch_array($run_cart)){

    
    $qty = $row_cart['qty'];
    
    $only_price = $row_cart['food_price'];

    $subtotal=$qty*$only_price;
    $total+=$subtotal;

    

}


?>

<link rel="stylesheet" href="./checkout.css">
<div id="page_header">
      <div class="page_title">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title">Be&nbsp;&nbsp;a&nbsp;&nbsp;Part&nbsp;&nbsp;Of&nbsp;&nbsp;Quick&nbsp;&nbsp;Meal&nbsp;&nbsp;to&nbsp;&nbsp;order</h2>
              
            </div>
          </div>
        </div>
      </div>
    </div>

<br>
<div class="checkout">
<div class="">
  
  <form action="ordernow.php" class="form" method="POST">
   <div class="form-width">

    <fieldset>
      <h3>Payment Method</h3>

      <div class="form__radios">
        <div class="form__radio rd1">
          <label for="visa"><svg class="icon">
              <!-- <use xlink:href="#icon-visa" /> -->
            </svg>Visa Payment</label>
          <input  id="visa" class="rd" name="payment-method" value="visa" type="radio" />
        </div>

        <div class="form__radio rd2">
          <label for="paypal"><svg class="icon">
              <!-- <use xlink:href="#icon-paypal" /> -->
            </svg>EasyPay</label>
          <input  id="easypay" name="payment-method" class="rd" value="easypay" type="radio" />
        </div>

        <div class="form__radio rd3">
          <label for="mastercard"><svg class="icon">
              <!-- <use xlink:href="#icon-mastercard" /> -->
            </svg>Offline Payment</label>
          <input  id="offline" name="payment-method" class="rd" value="offline" type="radio" />
          <input  id="c_id" name="customer-id" class="rd" value="<?php echo $customer_id; ?>" type="hidden" />
        </div>
      </div>
    </fieldset>

    <div>
      <h3 class="shop-heading">Shopping Bill</h3>

      <table>
        <tbody>
          <tr>
            <td>Shopping fee</td>
            <td align="right">Rs. 0</td>
          </tr>
          <!-- <tr>
            <td>Discount 10%</td>
            <td align="right">-$1.89</td>
          </tr> -->
          <tr>
            <td>Price Total</td>
            <td align="right">Rs. <?php echo $total ?></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td>Total</td>
            <td align="right">Rs. <?php echo $total ?></td>
          </tr>
        </tfoot>
      </table>
    </div>

    <div>
      <button class="button button--full" type="submit">
        Order Now</button>
    </div>
    </div>
  </form>
</div>
</div>
<script src="js/radiocheck.js"></script>
<?php include 'includes/footer.php'; ?>