<?php  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Items</title>
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
</head>


<body>
	<div class="w3-top" style="clear:both;">
		<div class="w3-bar w3-black w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<a href="index.php" class="w3-button w3-padding-large">Add an Item</a>
			<a href="viewItems.php" class="w3-button w3-padding-large">View Items</a>
			<a href="packageTracker.php" class="w3-button w3-padding-large">Track a Package</a>
			<a href="index.php" style="float:right; color: white; font-family: Verdana; font-size: 15px;" class="w3-padding-large">Inventory Tracker</a>
			<a href="login.php" style="float: right;" class="w3-button w3-padding-large">Login</a>
			<a href="register.php" style="float: right;" class="w3-button w3-padding-large">Register</a>
		</div>
	</div>
	<h2>Your Items:</h2>
	<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

$er = mysqli_select_db($conn,"product_tracker");

$Result = $conn->query("SELECT * FROM products;");
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Condition</th>
<th>Delete?</th>
</tr>";

while($row = mysqli_fetch_array($Result))
{
	echo "<tr>";
	echo "<td>" . $row['item_id'] . "</td>";
	echo "<td>" . $row['item_name'] . "</td>";
	echo "<td>$" . $row['item_price'] . "</td>";
	echo "<td>" . $row['item_quantity'] . "</td>";
	echo "<td>" . $row['item_condition'] . "</td>";
	echo "<td><a class='w3-button' style='background-color: #a0faff;' href='delete.php?id=".$row['item_id']."'>Delete Item</a></td>";
	echo "</tr>";

}
?>




</body>
</html>