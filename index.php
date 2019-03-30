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
<body max-width:2000px;margin-top:46px onload="getTime()">
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
			<div id="loggedOn">
				<?php  
					if($_SESSION['login'] == 1)
					{
						echo "<p style='padding-left: 20px;'>Welcome, " . $_SESSION['username'] . " - <span id='dateArea'></span> </p>"; 
					}
				?>
			<!-- Automatic Slideshow Images -->
		  <div class="mySlides w3-display-container w3-center" style="width: 100%">
		    <img src="./images/main_img1.jpg" style="width:100%">
		    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"></div>
		  </div>
		  <div class="mySlides w3-display-container w3-center">
		    <img src="./images/main_img2.jpg" style="width:100%">
		    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"></div>
		  </div>
		  <div class="mySlides w3-display-container w3-center">
		    <img src="./images/main_img3.jpg" style="width:100%">
		    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"></div>
		  </div>


			<h1 class="w3-wid w3-center">Inventory Tracker</h1>
			<p class="w3-opacity w3-center"><i>What is Inventory Tracker?</i></p>
				 <p class="w3-justify w3-center">
				 	Inventory Tracker is a web application for eccommerce sellers to keep track of their inventory. Easily store data such as quantity, cost basis, and condition. <br>Don't have an account already? 
				 	Just click "Register" above to create your account and start tracking your inventory. 
				 </p>
			<div>
				<div class="testimony testimonial">
					<i>"Amazon is now the best search engine for selling products."</i><p class="testFrom">- ignitevisibility.com</p><br>
					<i>"Amazon accounts for 43% of all online sales."</i><p class="testFrom">- inc.com</p>
				</div>
				<?php
					include './get_footer.php'; 
					get_footer();
				?>
			</div>
		
	</div>


	


<script type="text/javascript">

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

	function getTime(){
		var date = new Date();
		var hour = date.getHours();
		var minute = date.getMinutes();
		var day = date.getDay();
		var month = date.getMonth();

		var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		var area = document.getElementById('dateArea');

		if(hour > 12)
		{
			hour -= 12;
		}
		if(minute < 10) //If the clock needs a 0 before the minute, such as 6:04
		{
			area.innerHTML = "Happy " +  days[day] + "! It is currently " + hour + ":0" + minute;
		}
		else
		{
			area.innerHTML = "Happy " +  days[day] + "! It is currently " + hour + ":" + minute;
		}
		var a = setTimeout(getTime, 1000);

	}


</script>
</body>
</html>