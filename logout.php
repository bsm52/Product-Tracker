<?php 
	session_start();


	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['submit'])){
		$_SESSION['login']=0;
		echo "<script type='text/javascript'>alert('You have logged out Successfully!');</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
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
		<form id="register" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				Would you like to Logout?
				<input type="submit" name="submit">
		</form>
	</div>

</body>
</html>