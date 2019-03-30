<?php  
	session_start();
	error_reporting(0);

//This is to create registration for the user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['submit'])) {
    // collect values of input field
    $first_name = htmlspecialchars($_REQUEST['first']); 
    $last_name = htmlspecialchars($_REQUEST['last']);
	$username = htmlspecialchars($_REQUEST['uname']);
	$password = htmlspecialchars($_REQUEST['pw']);  

	// Create connection to user database
	$conn = mysqli_connect('localhost','root' , '');
	$er = mysqli_select_db($conn,"product_tracker");

	// Create connection to the shipping database so a table can be added for that individual user
	$conn2 = mysqli_connect('localhost','root' , '');
	$er2 = mysqli_select_db($conn2,"shipment_tracking");

   

    //Check that all fields were given a value
    if (empty($first_name) || empty($last_name) || empty($username) || empty($password))
    {
    	echo "<script type='text/javascript'>alert('Please Check that all fields were Given');</script>";
    }
    //everything is enterd
    else
    {
    	//check to see if username has already been created before
    	$sql = "SELECT * FROM users WHERE user_name='$username'";
    	$Result = mysqli_query($conn, $sql);
    	$checkResult = mysqli_num_rows($Result);

    	if($checkResult)
    	{
    		echo "<script type='text/javascript'>alert('This username has already been taken, try another');</script>";
    		exit();
    	}
    	else
    	{
				//hash the given password
		    	 $hashed_password = password_hash($password, PASSWORD_DEFAULT);
		    	 //run the query
		    	 $Result = $conn->query("INSERT INTO users(first_name, last_name, user_name, password) VALUES('$first_name','$last_name', '$username','$hashed_password')");
			    if($Result) //registration complete
			    {
			    	$sql = "CREATE TABLE " . $username . "_products(item_id INT NOT NULL AUTO_INCREMENT, item_name VARCHAR(75) NOT NULL, item_price DOUBLE NOT NULL, item_quantity INT NOT NULL, item_condition VARCHAR(30) NOT NULL, PRIMARY KEY ( item_id ));";
			    	$Result = mysqli_query($conn, $sql);
			    	


			    	$sql2 = "CREATE TABLE " . $username . "_shipping(item_id INT PRIMARY KEY AUTO_INCREMENT, product_name VARCHAR(40), tracking_num VARCHAR(40), date_added DATE);";
			    	$Result2 = mysqli_query($conn2, $sql2);


			    	//login and set username
			    	$_SESSION['login'] = 1;
			    	$_SESSION['username'] = $username;
			    	header('location: index.php?reg=1');
			    }
			    else
			    {
			    	echo "<script type='text/javascript'>alert('Error Creating Account, Please Try Again');</script>";
			    }
    	}
    }
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register an Account</title>
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
	<div class="register">
		<p>Set Up Your Account</p>
	</div>
	<div class="w3-center">
		<p>We just need a few things from you and before you use Inventory Tracker</p>
	</div>
	<div class="w3-content mainBody">
		<div class="login">
			<form id="register" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
				<input autocomplete="false" name="hidden" type="text" style="display:none;">
				<input type="text" name="first" placeholder="First Name" required> <br>
				<input type="text" name="last" placeholder="Last Name" required> <br>
				<input type="text" name="uname" placeholder="Username" required> <br>
				<input type="password" name="pw" placeholder="Password" required>	<br>
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
	<?php
		include './get_footer.php'; 
		get_footer();
	?>

</body>
</html>