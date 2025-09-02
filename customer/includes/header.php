<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>QuickMeal</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/bistro-icons.css" />
    <link rel="stylesheet" type="text/css" href="../css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/settings.css" />
    <link rel="stylesheet" type="text/css" href="../css/navigation.css" />
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="../css/owl.transitions.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="../css/zerogrid.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/Food.css" />
    <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">

  <!-- <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/backend.css" rel="stylesheet"> -->
  <!-- <link href="styles/style.css" rel="stylesheet"> -->

  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
     <?php 
    //  include("includes/function.php");
    include("includes/db.php");
     session_start();
     ?>
    <!-- <link rel="stylesheet" type="text/css" href="css/loader.css" /> -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--Loader-->
    <div class="loader">
      <div class="cssload-container">
        <div class="cssload-circle"></div>
        <div class="cssload-circle"></div>
      </div>
    </div>

    <!--Header-->
    <header id="main-navigation">
      <div id="navigation" data-spy="affix" data-offset-top="20">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <nav class="navbar navbar-default">
                <div class="navbar-header">
                  <button
                    type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#fixed-collapse-navbar"
                    aria-expanded="false"
                  >
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.html"
                    ><h1>Quick Meal</h1></a
                  >
                </div>

                <div
                  id="fixed-collapse-navbar"
                  class="navbar-collapse collapse navbar-right"
                >
                  <ul class="nav navbar-nav">
                    <li>
                      <a href="../index.php">Home</a>
                    </li>
                    <li><a href="../food.php">Our Food</a></li>

                    <li><a href="../order.php">Orders</a></li>
                    <li><a href="../recommendation.php">Recommendations</a></li>

                    <li><a href="../about.php">About Us</a></li>
                    <li>
                      <a href="
                      ../cart.php
                      "
                      class="item_cart"
                        ><i id="cart-btn" class="fa fa-shopping-cart fa-1.5x"></i
                      > &nbsp;<?php items(); ?>&nbsp; Items</a>
                    </li>
                    <?php
                     if(!isset($_SESSION['customer_email'])){

                      echo "<li><a href='loginSignup.php'>Login</a></li>";
                     }
                     else{
                      $customer_session = $_SESSION['customer_email'];

                      $get_customer = "select * from customers where customer_email='$customer_session'";
                      
                      $run_customer = mysqli_query($con,$get_customer);
                      
                      $row_customer = mysqli_fetch_array($run_customer);

                      
                      $customer_name = $row_customer['customer_name'];

                      echo "<li><a href='my_account.php?my_orders'>".$customer_name."</a></li>";
                      echo "<li><a href='logout.php'>LogOut</a></li>";
                     }
                    ?>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>

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