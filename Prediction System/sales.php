
<?php
  $currentpage = "sales";
  include 'base.php';
?>

<?php startblock('title') ?>
  Sales Records
<?php endblock() ?>

<?php startblock('body')
?>
<script>
  function sales(){
  location.replace("add_sales.php");
  }
</script>
<?php
  if (!$con) {
	echo '<p>Could not connect to the database</p>';
  } else {
	echo '</br><ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#view">View</a></li>
  <li><a data-toggle="tab" href="#add">Add</a></li>
  <li><a data-toggle="tab" href="#edit">Edit</a></li>
</ul>

<div class="tab-content">
  <div id="view" class="tab-pane fade in active">
  <h3>View sales records:</h3>';
  $query = 'SELECT * FROM orders ORDER BY order_id;';
	$result = @mysqli_query($con, $query);
	if (!$result){
	  echo '<p>No sales records found</p>';
	} else {
	  echo'
			  <fieldset>
			  <p><label for="order_id_search">Search by ID: </label><input type="text" name="order_id_search" ng-model="s.Order_ID" /></p>
			</fieldset>';
	  $emparray = array();
	  while ($row = @mysqli_fetch_assoc($result)){
		$emparray[] = $row;
	  }
	  $new = json_encode($emparray);
	  $new = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$new);
	  $new = str_replace('"', "'", $new);
	  echo '
	  <table class="table table-striped table-hover" ng-init="data = '.$new.'">
		<tr>
		  <th>ID</th>
		  <th>Order Date</th>
		  <th>Requested Date</th>
		  <th>Shipping Date</th>
		</tr>
		<tr ng-repeat="d in data | filter: s">
		  <td>{{d.Order_ID}}</td>
		  <td>{{d.order_date}}</td>
		  <td>{{d.req_date}}</td>
		  <td>{{d.shipping_date}}</td>
		</tr>

	  </table>';
	}
	echo'
  </div>
  <div id="add" class="tab-pane fade">
  <h3>Add sales records</h3>
  <form action="add_sales.php" method="post">
	<div class="row">
	<div class="col-lg-6">
	  <h3>Customer Data</h3>
	  <div class="row">
	  <div class="col-lg-6">
		<label for="compname">Company Name:</label>
	  </div>
	  <div class="col-lg-6">
		<input type="text" name="compname" id="compname"/></div>
	</div>
	<div class="row">
	  <div class="col-lg-6"><label for="contactnum">Contact Number:</label></div>
	  <div class="col-lg-6"><input type="text" name="contactnum" id="contactnum"/></div>
	</div>
	  <div class="row">
	  <div class="col-lg-6"><label for="address">Address:</label>
	  </div>
	  <div class="col-lg-6"><input type="text" name="address" id="address"/>
	  </div>
	  </div>
	  <div class="row">
	  <div class="col-lg-6"><label for="city">City:</label></div>
	  <div class="col-lg-6"><input type="text" name="city" id="city"/>
	  </div>
	  </div>
	</div>
	<div class="col-lg-6">
	  <h3>Order Data</h3>
	  <div class="row">
	  <div class="col-lg-6"><label for="orderdate">Order date:</label>
	  </div>
	  <div class="col-lg-6"><input type="date" name="orderdate" id="orderdate"/>
	  </div>
	  </div>
	  <div class="row">
	  <div class="col-lg-6"><label for="reqdate">Requested date:</label></div>
	  <div class="col-lg-6"><input type="date" name="reqdate" id="reqdate"/></div>
	  </div>
	  <div class="row">
	  <div class="col-lg-6"><label for="shipdate">Shipping date:</label></div>
	  <div class="col-lg-6"><input type="date" name="shipdate" id="shipdate"/></div>
	  </div>
	</div>
  </div>
	<div class="row">
	<h3>Product Details</h3>
	<div class="row">';
	  echo "<div class='col-lg-2'><label name='prod1type'>Product Type:</label></div>";
	  echo "<div class='col-lg-2'>";
	  $query4select = "Select product_id, product_name from products order by product_name";
	  $selectlist = mysqli_query($con,$query4select);


	  echo "<select name='prodtype'>";
	  while($selectrowpopu = mysqli_fetch_assoc($selectlist)){
		  echo "<option value = ",$selectrowpopu["product_id"],">",$selectrowpopu["product_name"],"</option>";
	  }
		echo"</select>";
	  echo "</div>";
	echo'
	  </div>
	<div class="row">
	  <div class="col-lg-2"><label for="quantity">Quantity :</label></div>
	  <div class="col-lg-2">
		<input type="text" name="quantity" id="quantity"/>
	  </div>
	  </div>
	<div class="row">
	  <div class="col-lg-2"><label for="discount">Discount :</label></div>
	  <div class="col-lg-3">
		<input type="text" name="discount" id="discount"/><span> &#37;</span>
	  </div>
	  </div>
	</div>
	<button type="submit" class="btn btn-primary "> Submit Order</button>
	<button type="reset" class="btn btn-primary "> Reset Order</button>
  </form>
	<div>';

  if(!$con){
	echo "Problem with data base! Check back later!";
  }else{
	echo "connected to database";

	$errMsg=" \n";
	 function sanitise_input($data) {
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
	 }

	 if(isset($_POST["compname"])&&isset($_POST["contactnum"])&&isset($_POST["address"])&&isset($_POST["city"])&&isset($_POST["orderdate"])&&isset($_POST["reqdate"])&&isset($_POST["shipdate"])){


		$querycusid = "SELECT customer_id FROM customers ORDER BY customer_id DESC LIMIT 1";

		$queryordid="SELECT Order_ID FROM orders ORDER BY Order_ID DESC LIMIT 1";

		$lastIDcus = mysqli_query($con,$querycusid);
		$lastIDord = mysqli_query($con,$queryordid);

		$compname=$_POST["compname"];
		$contactnum=$_POST["contactnum"];
		$address=$_POST["address"];
		$city=$_POST["city"];
		$orderdate=$_POST["orderdate"];
		$reqdate=$_POST["reqdate"];
		$shipdate=$_POST["shipdate"];
		$product=$_POST["prodtype"];
		$quantityprod = $_POST["quantity"];
		$discount=$_POST["discount"];

		$compname=sanitise_input($compname);//sanitise the inputs
		$contactnum=sanitise_input($contactnum);
		$address=sanitise_input($address);
		$city=sanitise_input($city);
		$orderdate=sanitise_input($orderdate);
		$reqdate=sanitise_input($reqdate);
		$shipdate=sanitise_input($shipdate);
		$quantityprod=sanitise_input($quantityprod);
		$discount=sanitise_input($discount);

		$rownum1 = mysqli_fetch_assoc($lastIDcus);//get the last customer id
		$rownum2 = mysqli_fetch_assoc($lastIDord);//get the last order id

		$lastIDcus = $rownum1["customer_id"];
		$lastIDord = $rownum2["Order_ID"];

		$newIDcus = $lastIDcus + 1;//increment customer id
		$newIDord = $lastIDord + 2;//increment order id

		$query1forCus = "INSERT INTO customers (customer_id, company_name, contact_num, address, city) VALUES('$newIDcus','$compname','$contactnum','$address','$city')";

		$result1 = mysqli_query($con,$query1forCus);

		$query2forOrd = "INSERT INTO orders (Order_ID, order_date, req_date, shipping_date) VALUES('$newIDord','$orderdate','$reqdate','$shipdate')";

		$result2 = mysqli_query($con,$query2forOrd);

		$query3forBoth = "INSERT INTO customer_orders (Customer_ID, Order_ID) VALUES ('$newIDcus','$newIDord')";

		$result3 = mysqli_query($con,$query3forBoth);

		$query3fororddetails = "INSERT INTO order_details(Order_ID, product_id, Quantity, Discount) VALUES ('$newIDord','$product','$quantityprod','$discount')";

		$result4 = mysqli_query($con,$query3fororddetails);

	  if($result1 && $result2 && $result3 && $result4){
		receipt($newIDord, $product, $quantityprod,$discount,$servername, $username, $password, $database);
		  echo"<p> Database is populated! </p>";
	  }else{
		echo "check queries";
	  }

	 }else{
	   $errMsg=$errMsg+"An error occured when populating Database! \n";
	   echo $errMsg;
	 }

  }
	function receipt($newIDord,$product, $quantityprod,$discount,$servername, $username, $password, $database){
	  require_once("require.php");
	  $con = mysqli_connect($servername, $username, $password, $database);
	  echo $newIDord;

	  $dataquery1 = "SELECT customers.company_name, customers.contact_num, customers.address, orders.order_date, orders.req_date, orders.shipping_date
FROM customers
INNER JOIN customer_orders ON customers.customer_id = customer_orders.Customer_ID
INNER JOIN orders ON customer_orders.Order_ID = orders.Order_ID
WHERE orders.Order_ID = ".$newIDord;
	  $result4 = mysqli_query($con,$dataquery1);

	  $dataquery2 = "SELECT unit_price from products where product_id = ".$product;

	  $result5 = mysqli_query($con,$dataquery2);

	  $updatequery = "UPDATE products set unit_on_order = unit_on_order +
	  '$quantityprod', recorded_level = 	unit_in_stock - unit_on_order where product_id = '$product'";

	  $result6 = mysqli_query($con,$updatequery);

	  $makerecipt = "select * from products where product_id = '$product'";

	  $result7 = mysqli_query($con,$makerecipt);
	  $getprddata = mysqli_fetch_assoc($result7);

	  $val = $getprddata["unit_price"];
	  $totalval = $val * $quantityprod - $val * $discount;
	  $name = $getprddata["product_name"];


	  echo "<div class='table-responsive'>";
	  echo "<h3>Order Details : <br/></h3>";
	  echo   "<table class='table table-striped table-hover'>";
	  echo     "<tr>"
		 ."<th>Company Name</th>"
		 ."<th>Contact Number</th>"
		 ."<th>Address</th>"
		 ."<th>Order Date</th>"
		 ."<th>Requested Date</th>"
		 ."<th>Shipping Date</th>"
		 ."</tr>";
	  while($rownum3 = mysqli_fetch_assoc($result4)){
	  echo   "<tr>";
	  echo     "<td >",$rownum3["company_name"],"</td>";
	  echo     "<td >",$rownum3["contact_num"],"</td>";
	  echo     "<td >",$rownum3["address"],"</td>";
	  echo     "<td >",$rownum3["order_date"],"</td>";
	  echo     "<td >",$rownum3["req_date"],"</td>";
	  echo     "<td >",$rownum3["shipping_date"],"</td>";
	  echo   "</tr>";
	  }
	  echo  "</table>";
	  echo "</div>";

	  echo "<div class='table-responsive'>";
	  echo   "<table class='table table-striped table-hover'>";
	  echo     "<tr>"
		  ."<th>Product Name</th>"
		  ."<th>Unit Price</th>"
		  ."<th>Discount</th>"
		  ."<th>Total Amount</th>"
		  ."</tr>";
	  echo   "<tr>";
	  echo     "<td >",$name,"</td>";
	  echo     "<td >",$val,"</td>";
	  echo     "<td >",$discount,"</td>";
	  echo     "<td >",$totalval,"</td>";
	  echo   "</tr>";
	  echo  "</table>";
	  echo "</div>";


	  mysqli_free_result($result4);
	  mysqli_free_result($result7);


	}
	echo'
  </div>
  </div>


  <div id="edit" class="tab-pane fade">
  <h3>Edit sales records</h3>';
  ?>
  <table  class="table table-striped table-hover">

	<tr>
	  <th>ID</th>
	  <th>Order Date</th>
	  <th>Requested Date</th>
	  <th>Shipping Date</th>
	</tr>
	<?php
	  if (!$con) {
		echo '<p>Could not connect to the database</p>';
	  } else {
	  $query = 'SELECT Order_ID,order_date,req_date,shipping_date FROM orders ORDER BY Order_ID;';
	  $result = @mysqli_query($con, $query);
	  if (!$result){
		echo '<p>No sales records found</p>';
	  } else {
	  while ($row = @mysqli_fetch_assoc($result)){
	?>
	<tr>
		<td><?php echo $row['Order_ID' ];?></td>
		<td><?php echo $row['order_date'];?></td>
		<td><?php echo $row['req_date' ];?></td>
		<td><?php echo $row['shipping_date'];?></td>
		<td><a href="delete.php?id=<?php echo $row['Order_ID']; ?>">Delete</a></td>
		<td><a href="edit.php?id=<?php echo $row['Order_ID']; ?>">Edit</a></td>
	</tr>
	<?php
		}
	  }
	}
  }
  echo'

  </div>
</div>';

?>
<?php endblock() ?>
</table>
</body>
</html>
