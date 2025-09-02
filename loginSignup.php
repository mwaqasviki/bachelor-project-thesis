<!-- <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
 
  <link rel="stylesheet" href="./style.css">

</head>
<body> -->
<?php include("includes/header.php");
$ip_add = getRealUserIp();
$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);
    // echo "<script>alert('$check_check')</script>";
  if($check_cart == 0 AND isset($_SESSION['customer_email']) )
  {
    echo "<script>window.open('food.php','_self')</script>";
  }

if(isset($_SESSION['customer_email'])){

    echo "<script>window.open('checkout.php','_self')</script>";
    
    
    }else {
        

?>
<link rel="stylesheet" href="./style.css">
<!-- partial:index.partial.html -->
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
    <div class="cont">
        <form class="form sign-in"  method="post">
            <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input type="email" name="c_email" />
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="c_password" />
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="submit" name="login" class="submit">Sign In</button>
         
        </form>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up and get the best deals!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <form class="form sign-up"  method="post">
                <h2>Create your Account</h2>
                <label>
                    <span>Name</span>
                    <input type="text" name="c_name" required/>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="c_email" required/>
                </label>
                
                <label>
                    <span>Password</span>
                    <input type="password" name="c_pass" required />
                </label>
                <label>
                    <span>Confirm Password</span>
                    <input type="password" required />
                </label>
                <label>
                    <span>Phone</span>
                    <input type="tel" name="c_contact" min="11" max="11" required  />
                </label>
                <button type="submit" name="register" class="submit">Sign Up</button>
                
            </form>
        </div>
    </div>

    <?php  
if(isset($_POST['login'])){
    $customer_email = $_POST['c_email'];
  
    
    
    $customer_pass = $_POST['c_password'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
$c_id = $row_customer['customer_id'];
    
    $get_ip = getRealUserIp();
    
    $check_customer = mysqli_num_rows($run_customer);

    // echo "<script>alert('$check_customer')</script>";
    if($check_customer==0){
    
        echo "<script>alert('password or email is wrong')</script>";
        
        exit();
        
        }
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
   
    
    if($check_customer==1 AND $check_cart==0){
    
    $_SESSION['customer_email']=$customer_email;
    $_SESSION['customer_id']=$c_id;
    echo "<script>alert('You are Logged In')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    
    
    }
    else {
    
    $_SESSION['customer_email']=$customer_email;
    $_SESSION['customer_id']=$c_id;
    echo "<script>alert('You are Logged In')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
    
    
    } 
    
    
    }
if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];

$c_email = $_POST['c_email'];

$c_pass = $_POST['c_pass'];

$c_contact = $_POST['c_contact'];

$c_ip = getRealUserIp();
$get_email = "select * from customers where customer_email='$c_email'";

$run_email = mysqli_query($con,$get_email);

$check_email = mysqli_num_rows($run_email);
$row_customer = mysqli_fetch_array($run_customer);
$c_id = $row_customer['customer_id'];

if($check_email == 1){

echo "<script>alert('This email is already registered, try another one')</script>";

exit();

}

// $customer_confirm_code = mt_rand();

// $subject = "Email Confirmation Message";

// $from = "sad.ahmed22224@gmail.com";

// $message = "

// <h2>
// Email Confirmation By Computerfever.com $c_name
// </h2>

// <a href='localhost/ecom_store/customer/my_account.php?$customer_confirm_code'>

// Click Here To Confirm Email

// </a>

// ";

// $headers = "From: $from \r\n";

// $headers .= "Content-type: text/html\r\n";

// mail($c_email,$subject,$message,$headers);

$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_contact,customer_ip) values ('$c_name','$c_email','$c_pass','$c_contact','$c_ip')";


$run_customer = mysqli_query($con,$insert_customer);

$sel_cart = "select * from cart where ip_add='$c_ip'";

$run_cart = mysqli_query($con,$sel_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_cart>0){

$_SESSION['customer_email']=$c_email;
$_SESSION['customer_id']=$c_id;
echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}else{

$_SESSION['customer_email']=$c_email;
$_SESSION['customer_id']=$c_id;
echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('index.php','_self')</script>";


}


}
    

?>
    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
<!-- partial -->
  
<?php include 'includes/footer.php'; }
?>
