<?php  
	session_start();
	error_reporting(0);

	$Register = $_GET['reg'];
	if($Register == 1)
	{
		 echo "<script type='text/javascript'>alert('You Have Created an Account');</script>";
	}
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
<body max-width:2000px;margin-top:46px>
	<div class="w3-top" style="clear:both;">
		<div class="w3-bar w3-black w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<?php 
			if($_SESSION['login'] == 1) //if the user has not logged in yet
			{
				echo "<a href='addItem.php' class='w3-button w3-padding-large'>Add an Item</a>";
				echo "<a href='viewItems.php' class='w3-button w3-padding-large'>View Items</a>";
				echo "<a href='packageTracker.php' class='w3-button w3-padding-large'>Track a Package</a>";
			}
		 	?>
			<!--<a href="addItem.php" class="w3-button w3-padding-large">Add an Item</a>
			<a href="viewItems.php" class="w3-button w3-padding-large">View Items</a>
			<a href="packageTracker.php" class="w3-button w3-padding-large">Track a Package</a>-->
			<a href="index.php" style="float:right; color: white; font-family: Verdana; font-size: 15px;" class="w3-padding-large">Inventory Tracker</a>
		<?php 
			if($_SESSION['login'] == 0) //if the user has not logged in yet
				echo "<a href='login.php' style='float: right;' class='w3-button w3-padding-large'>Login</a>";
			else
				echo "<a href='logout.php' style='float: right;' class='w3-button w3-padding-large'>Logout</a>";
		 ?>
			<!--<a href="login.php" style="float: right;" class="w3-button w3-padding-large">Login</a>
			<a href="logout.php" style="float: right;" class="w3-button w3-padding-large">Logout</a>-->
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
		<!-- Automatic Slideshow Images -->
	  <div class="mySlides w3-display-container w3-center" style="width: 100%">
	    <img src="./images/main_img1.jpg" style="width:100%">
	    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"> 
	    </div>
	  </div>
	  <div class="mySlides w3-display-container w3-center">
	    <img src="./images/main_img2.jpg" style="width:100%">
	    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">   
	    </div>
	  </div>
	  <div class="mySlides w3-display-container w3-center">
	    <img src="./images/main_img3.jpg" style="width:100%">
	    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"> 
	    </div>
	  </div>


		<h1 class="w3-wid w3-center">Inventory Tracker</h1>
		<p class="w3-opacity w3-center"><i>What is Inventory Tracker?</i></p>
		<div>
			
		</div>
			 <p class="w3-justify">
			 	Inventory Tracker is a web application for eccommerce sellers to keep track of their inventory. Easily store data such as quantity, cost basis, and condition. <br>Don't have an account already? 
			 	Just click "Register" above to create your account and start tracking your inventory. 
			 </p>
		<div>
			<footer  style="margin-top: 500px;" class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
				<p class="w3-medium">
					By Brandon Meier -
					Copyright 2019
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

	// Automatic Slideshow - change image every 4 seconds
	var myIndex = 0;
	carousel();

	function carousel() {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  for (i = 0; i < x.length; i++) {
	    x[i].style.display = "none";  
	  }
	  myIndex++;
	  if (myIndex > x.length) {myIndex = 1}    
	  x[myIndex-1].style.display = "block";  
	  setTimeout(carousel, 6000);    
	}


</script>
</body>
</html>