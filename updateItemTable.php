<?php 
 	session_start();
	$login = $_SESSION['login'];
	$un = $_SESSION['username'];
if($login == 1)
{
	$id = $_GET['id'];
	$name = $_GET['name'];
	$price = $_GET['price'];
	$condition = $_GET['cond'];
	$quantity = $_GET['quant'];
}
else
{
	header("Location: index.php");
}
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body style="height: 500px; width: 400px">
	

	<div class="w3-content mainBody" style="margin-top: 15px;">
		<div class="login" style="height: 400px; margin-top: 15px;">
			<form id="login" method="post" action="modify.php?id=<?php echo $id ?>">
				<input type="text" name="name" value="<?php echo $name; ?>" placeholder="name" > 
				<input type="text" name="price" value="<?php echo  $price; ?>" placeholder="price" >
				<input type="text" name="quant" value="<?php echo $quantity; ?>" placeholder="quantity" >
				<input type="text" name="cond" value="<?php echo $condition; ?>" placeholder="condition" >
				<input type="submit" value="Submit Changes">
			</form>
		</div>
	</div>
</body>
</html>