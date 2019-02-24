<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

$er = mysqli_select_db($conn,"product_tracker");

$name = $_POST["item"];
$price = $_POST["priceBought"];
$quantity = $_POST["quantity"];
$condition = $_POST["condition"];

$Result = $conn->query("INSERT INTO products (item_name, item_price, item_quantity, item_condition) VALUES('" . $name . "','"  . $price . "', '" . $quantity . "','" . $condition . "')") ;
?>
<div class="w3-top" style="clear:both;">
		<div class="w3-bar w3-black w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<a href="index.php" class="w3-button w3-padding-large">Add an Item</a>
			<a href="viewItems.php" class="w3-button w3-padding-large">View Items</a>
			<a href="packageTracker.php" class="w3-button w3-padding-large">Track a Package</a>
			<span style="float:right; color: white; font-family: Verdana; font-size: 15px;" class="w3-padding-large">Inventory Tracker</span>
			<a href="login.php" style="float: right;" class="w3-button w3-padding-large">Login</a>
			<a href="register.php" style="float: right;" class="w3-button w3-padding-large">Register</a>
		</div>
	</div>

	<div>
		<p>Your <?php echo $name; ?> has been entered!</p>
	</div>

</body>
</html>