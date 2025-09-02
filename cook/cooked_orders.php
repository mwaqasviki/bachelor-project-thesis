<!doctype html>
<html lang="en">
  <head>
  	<title>Cooking Section</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CRoboto" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
        <?php include "includes/db.php";?>
	<section class="section">
        
    <div class="d-flex justify-content-center" >
        <div class="m-3">
        <a href="uncooked_orders.php" class="btn btn-danger p-2">Uncooked Orders</a>
        </div>
</div>
    </div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="h5 mb-4 text-center">Orders Cooked</h3>
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	
						    	<th>#</th>
                                <th>&nbsp;</th>
						    	<th>Food Name</th>
						      <th>Table No</th>
						      <th>Quantity</th>
                              <th>Status</th>
						      <th>&nbsp;</th>
                              
						      
						    </tr>
						  </thead>
                          
						  <tbody>
                              <?php 

$get_orders = "SELECT food_id, qty ,table_no,cook_status FROM pending_orders WHERE order_status='Complete' AND Cook_status='Cooked' ORDER BY order_date ASC";

$run_orders = mysqli_query($con,$get_orders);

$i=0;
while ($row_orders = mysqli_fetch_array($run_orders)) {
$i++;

$food_id = $row_orders['food_id'];

$quantity = $row_orders['qty'];
$table_no = $row_orders['table_no'];
$cook_status = $row_orders['cook_status'];

$get_foods = "select title,image from food where id='$food_id'";

$run_foods = mysqli_query($con,$get_foods);

$row_foods = mysqli_fetch_array($run_foods);

$food_title = $row_foods['title'];
$food_image = $row_foods['image'];
                              ?>
						    <tr class="alert" role="alert">
						    <td>
                                <p><?php echo $i;?></p>
                            </td>
						    	<td>
						    		<div class="img" style="background-image: url(../admin/food_images/<?php echo $food_image; ?>);"></div>
						    	</td>
						      <td>
						      	<div class="">
						      		<p><?php echo $food_title;?></p>
						      	</div>
						      </td>
						      <td>
                                  <p><?php echo $table_no;?></p>
                              </td>
						      <td class="">
					        	
				             	<p><?php echo $quantity;?></p>
				          	
				          </td>
				          <td><?php echo $cook_status; ?></td>
						      
						    </tr>

						   <?php }?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>