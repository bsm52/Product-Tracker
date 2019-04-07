<?php  
	session_start();
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	 {
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

		$Result = $conn->query("INSERT INTO ". $_SESSION['username'] . "_products (item_name, item_price, item_quantity, item_condition) VALUES('" . $name . "','"  . $price . "', '" . $quantity . "','" . $condition . "')") ;
	 }

?>
<div class="w3-top" style="clear:both;">
		<div class="w3-bar w3-black w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<?php
				include './get_header.php'; 
				get_header();
			?>
		</div>
	</div>

	<div>
		<p>Your <?php echo $name; ?> has been entered!</p>
	</div>
	<div>
		<div id="addFormArea" class="">
			<?php 
				if($_SERVER['REQUEST_METHOD']=='POST')
				{
					echo "<p>Your " . $name . " has been added!";
				}
			 ?>
			<h2 style="font-family: Verdana;">Add your Item:</h2>
			<p>Please enter the Following Values for a Product</p>

			<form id="addForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<input type="text" name="item" placeholder="Item Name"><br>
				<input type="text" name="priceBought" step="0.01" min="0.01" placeholder="Bought Price"><br>
				<input type="text" name="quantity" min="0" placeholder="How Many?"><br><br>
				 <span>Item Condition:</span>
					 <input type="checkbox" name="condition" value="new">New 
					 <input type="checkbox" name="condition" value="used">Used <br>
				<input type="submit" name="submit">
				
			</form>
		</div>
	</div>
	<?php
		include './get_footer.php'; 
		get_footer();
	?>
	
	<script type="text/javascript">
		function popup(){
		popupwindow = window.open('get_title.php', 'popupwindow', 'height=500,width=400,left=200,top=50,resizable=yes,scrollbars=yes,toolbar=yes' );
	}
	</script>
</body>
</html>