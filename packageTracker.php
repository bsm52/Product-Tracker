<?php  
	session_start();
	error_reporting(0);

	$un = $_SESSION['username'];
	$loggedOn = $_SESSION['login'];

	$view = $_GET['view'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Track a Package</title>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="./mainStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
	<div class="w3-content mainBody">
		<div>
			<form id="trackingInfo" class="trackingArea" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<span>Please enter your USPS tracking number:</span><br>
				<input type="text" style="width: 300px;" placeholder="Tracking Number" name="trackingNum" required><br>
				<input type="text" name="product" placeholder="Product Name" required> <br>
				<input type="submit" name="Submit">
			</form>
		</div>

		<?php
			if($view == 1)
			{
				//connect to the shipment_tracking DB
				$conn = mysqli_connect('localhost','root' , ''); 
				$er = mysqli_select_db($conn, 'shipment_tracking');

				//connect to the product's DB
				$conn2 = mysqli_connect('localhost','root' , ''); 
				$er2 = mysqli_select_db($conn2, 'product_tracker');
			}
			else
			{
				$track = $_GET['track'];
				$lookup = $_GET['lookup'];
				$prod = $_GET['prod'];
				if ($_SERVER["REQUEST_METHOD"] == "POST" && $loggedOn == 1)
				{


					//connect to the shipment_tracking DB
					$conn = mysqli_connect('localhost','root' , ''); 
					$er = mysqli_select_db($conn, 'shipment_tracking');


					$product = $_REQUEST['product'];
					$trackingNum =$_REQUEST['trackingNum'];	
					echo $product;

					echo "<p class='displayTracking'>";
					//echo $trackingNum;
					//api url
					$url = "http://production.shippingapis.com/ShippingAPI.dll?API=TrackV2&XML=<TrackRequest USERID='753BMSTC4882'><TrackID ID='$trackingNum'></TrackID></TrackRequest>";
					$xml = simplexml_load_file($url);
					for($i = 0; $i < 10; $i++)
					{
						$title = $xml->TrackInfo->TrackDetail[$i];
						echo " - $title <br>";
					}
					echo "</p>";

					$trackingNum = $_REQUEST['trackingNum'];	

					//add that tracking number and into the database 
					$sql = "INSERT INTO " . $un . "_shipping(product_name, tracking_num, date_added) VALUES('$product', $trackingNum, NOW());";
					$Result = mysqli_query($conn, $sql);
					$trackingNum = intval($trackingNum);
					



				}
				elseif ($loggedOn != 1)
				{
					echo "You Have Yet to Log In!";
				}
				elseif($lookup == 1)
				{

					echo "<h1 style=\"text-align: center; margin-top: 50px;\">Your Tracking Info for " . $prod . "</h1>";

					$conn = mysqli_connect('localhost','root' , ''); 
					$er = mysqli_select_db($conn, 'shipment_tracking');

					$trackingNum = $track;	

					echo "<p class='displayTracking'>";
					//echo $trackingNum;
					//api url
					$url = "http://production.shippingapis.com/ShippingAPI.dll?API=TrackV2&XML=<TrackRequest USERID='753BMSTC4882'><TrackID ID='$trackingNum'></TrackID></TrackRequest>";
					$xml = simplexml_load_file($url);
					echo $xml->TrackInfo->TrackSummary . "<br>";
					for($i = 0; $i < 10; $i++)
					{
						$title = $xml->TrackInfo->TrackDetail[$i];
						echo " - $title <br>";
					}
					echo "</p>";
				}
			}
			


			
		 ?>
	</div>
	<div class="packagesSaved">
		<h1>View Your Saved Packages</h1>
		<br>
		<div>
		<?php 
				$conn = mysqli_connect('localhost','root' , ''); 
				$er = mysqli_select_db($conn, 'shipment_tracking');
				$Result = $conn->query("SELECT * FROM " . $un . "_shipping;");
				
				echo "<table border='1' class='table' width='35%'>
				<tr>
				<th>Name</th>
				<th>Tracking Number</th>
				<th>View Shipping History</th>
				</tr>";

				while($row = mysqli_fetch_array($Result))
				{

					echo "<tr>";
					echo "<td>" . $row['product_name'] . "</td>";
					echo "<td>" . $row['tracking_num'] . "</td>";
					echo "<td><a class='w3-button' href='packageTracker.php?track=".$row['tracking_num'] . "&lookup=1&prod=" .$row['product_name'] . "'>View History</a></td>";
					echo "</tr>";

				}	
		 ?>
		 </div>
	</div>




	 

</body>
</html>