
<?php  
//This Function keeps all of the header information in one function so that it doesn't have to be written on every page
session_start();

		function get_header(){

			if($_SESSION['login'] == 1) //if the user has logged in, then show these buttons
			{
				echo "<a href='addItem.php' class='w3-button w3-padding-large'>Add an Item</a>";
				echo "<a href='viewItems.php' class='w3-button w3-padding-large'>View Items</a>";
				echo "<a href='packageTracker.php' class='w3-button w3-padding-large'>Track a Package</a>";
			}
		    echo "<a href='index.php' style='float:right; color: white; font-family: Verdana; font-size: 15px;'' class='w3-padding-large'>Inventory Tracker</a>";
		
			if($_SESSION['login'] == 0) //if the user has not logged in yet, don't show these buttons
			{
				echo "<a href='login.php' style='float: right;' class='w3-button w3-padding-large'>Login</a>";
				echo "<a href='register.php' style='float: right;' class='w3-button w3-padding-large'>Register</a>";
			}
			else
				echo "<a href='logout.php' style='float: right;' class='w3-button w3-padding-large'>Logout</a>";
		
			}
		

 ?>