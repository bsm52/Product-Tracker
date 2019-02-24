<?php  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		Product Tracker
	</title>
</head>
<body style="height: 1500px;">
	<div class="w3-top" style="clear:both;">
		<div class="w3-bar w3-black w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<a href="index.php" class="w3-button w3-padding-large">Add an Item</a>
			<a href="viewItems.php" class="w3-button w3-padding-large">View Items</a>
			<a href="packageTracker.php" class="w3-button w3-padding-large">Track a Package</a>
			<a href="index.php" style="float:right; color: white; font-family: Verdana; font-size: 15px;" class="w3-padding-large">Inventory Tracker</a>
			<a href="login.php" style="float: right;" class="w3-button w3-padding-large">Login</a>
			<a href="logout.php" style="float: right;" class="w3-button w3-padding-large">Logout</a>
			<a href="register.php" style="float: right;" class="w3-button w3-padding-large">Register</a>
		</div>
	</div>


	<div class="w3-content mainBody">
		<div id="loggedOn">
		<?php  
			if($_SESSION['login'] == 1)
			{
				echo "<p>Welcome, " . $_SESSION['username'] . "!<p>"; 
			}
		?>
	</div>
		<div class="w3-display-container w3-center">
			<img id="pic" src="https://www.volusion.com/blog/content/images/2018/06/Shipping.jpg" width="50%" height="30%" style="float:left" onclick="funct()">
			<img src="https://www.volusion.com/blog/content/images/2018/02/Amazon.jpg" width="50%" height="30%" style="float:left">
		</div>

		<div id="addFormArea" class="addItem">
			<h2>Add your Item:</h2>
			<form id="addForm" method="post" action="additem.php">
				<input type="text" name="item" placeholder="Item Name"><br>
				$<input type="number" name="priceBought" step="0.01" min="0.01" placeholder="Bought Price"><br>
				How Many? <input type="number" name="quantity" min="0"><br>
				Item Condition:<br>
					 <input type="checkbox" name="condition" value="new">New <br>
					 <input type="checkbox" name="condition" value="used">Used <br>
				<input type="submit">
				
			</form>
		</div>


		<div>
			<footer  style="margin-top: 500px;" class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
				<p class="w3-medium">
					By Brandon Meier
				</p>
			</footer>
		</div>
	</div>


	


<script type="text/javascript">
	function addItem(){
		var form = document.getElementById('addForm');
		var item = form['item'].value;
		var price = form['priceBought'].value;
		var location = form['location'].value;
		if(form == '' || item == '' || price == '')
		{
			alert("Not all Values have been entered");
		}

		else
			alert("You Added " + item +  " Costing $" + price + " From " + location);
		}
	function funct(){
		var picture = document.getElementById('pic');
		picture.src = "https://vignette.wikia.nocookie.net/theoffice/images/9/96/Prisonmike.png/revision/latest?cb=20100327171549";

	}
</script>
</body>
</html>