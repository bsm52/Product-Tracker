<?php  
	session_start();
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Track a Package</title>
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
			<?php 
			if($_SESSION['login'] == 0) //if the user has not logged in yet
				echo "<a href='login.php' style='float: right;' class='w3-button w3-padding-large'>Login</a>";
			else
				echo "<a href='logout.php' style='float: right;' class='w3-button w3-padding-large'>Logout</a>";
		    ?>
			<a href="register.php" style="float: right;" class="w3-button w3-padding-large">Register</a>
		</div>
	</div>


	<div class="w3-content">
		http://production.shippingapis.com/ShippingApi.dll?API=TrackV2&XML=<TrackFieldRequest USERID="753BMSTC4882">
		<TrackID ID="9405509699937255102541"></TrackID> 
		</TrackFieldRequest>
		<TrackResponse>
			<TrackInfo ID="9405509699937255102541">
				<TrackSummary></TrackSummary>
				<TrackDetail></TrackDetail>
			</TrackInfo>

		</TrackResponse>
	</div>

</body>
</html>