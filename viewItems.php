<?php  
	session_start();
	error_reporting(0);

	$un = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Items</title>
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="util.css">
</head>


<body>
	<div class="w3-top" style="clear:both;">
		<div class="w3-bar w3-black w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<?php
				include './get_header.php'; 
				get_header();
			?>
		</div>
	</div>
	<h2>Your Items:</h2>
	<?php


if($_SESSION['login'] == 1)
{
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	$er = mysqli_select_db($conn,"product_tracker");

	$Result = $conn->query("SELECT * FROM " . $un . "_products;");
	echo "<table border='1' class='table'>
	<tr>
	<th>Name</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>Condition</th>
	<th>Delete</th>
	<th>Modify</th>
	<th>Ship</th>
	</tr>";

	while($row = mysqli_fetch_array($Result))
	{

		echo "<tr>";
		echo "<td>" . $row['item_name'] . "</td>";
		echo "<td>$" . $row['item_price'] . "</td>";
		echo "<td>" . $row['item_quantity'] . "</td>";
		echo "<td>" . $row['item_condition'] . "</td>";
		echo "<td><a class='w3-button' style='background-color: #e5e5e5; border-radius: 5px;' href='delete.php?id=".$row['item_id']."'>Delete Item</a></td>";
		echo "<td><a class='w3-button' style='background-color: #e5e5e5; border-radius: 5px;' onclick=\"popup('https://www.google.com')\">Modify Item</a></td>";
		echo "<td><a class='w3-button' style='background-color: #e5e5e5; border-radius: 5px;' href='packageTracker.php?name=".$row['item_name']."&ship=1'>Ship Item</a></td>";
		echo "</tr>";

	}	
}
else
{
	echo "   You Haven't Logged into your Account Yet!";
}

?>

<script type="text/javascript">
	function popup(url){
		popupwindow = window.open(url, 'popupwindow', 'height=500,width=400,left=200,top=50,resizable=yes,scrollbars=yes,toolbar=yes' );
	}
</script>
</body>
</html>