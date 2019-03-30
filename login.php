<?php 
session_start();
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = htmlspecialchars($_REQUEST['username']);
	$password = htmlspecialchars($_REQUEST['password']);

	// Create connection
    $conn = mysqli_connect('localhost','root' , '');
    $er = mysqli_select_db($conn,"product_tracker");

    $Result = $conn->query("SELECT * FROM users WHERE user_name ='$username'");
    $row = mysqli_fetch_assoc($Result);

   //$hashed_password = password_hash($password, PASSWORD_DEFAULT);



	if (password_verify($password, $row['password']))
	{
	    //echo "<script type='text/javascript'>alert('You have Logged In Successfully');</script>";
	    $_SESSION["login"]=1;
	    $_SESSION["username"]=$username;
	    header('location: index.php');
	} 
	else 
	{
	    echo "<script type='text/javascript'>alert('not good');</script>";
	}




}?>
 <!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		<div class="login" style="height: 257px;">
			<form id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<input type="text" name="username" placeholder="Username"> <br>
				<input type="password" name="password" placeholder="Password">	<br>
				<input type="submit" >
			</form>
		</div>
	</div>

	<?php
		include './get_footer.php'; 
		get_footer();
	?>


</body>
</html>




