<?php 
	
	session_start();
	$un = $_SESSION['username'];
	$login = $_SESSION['login'];
	$id = $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="mainStyle.css">

</head>
<body>
	<body style="height: 500px; width: 500px">

	<div class="w3-content mainBody" style="margin-top: 15px;">
		<div class="login" style="height: 400px; margin-top: 15px;">
			<form id="login" method="post" action="packageTracker.php?id=<?php echo $id ?>&view=1" target="_blank">
				<input type="text" name="trackNum" placeholder="Tracking Number" >
				<input type="text" name="quantity" placeholder="Number Shipped" >
				<input type="submit" value="Save Shipment" onclick="closePop();">
			</form>
		</div>
	</div>

	<script type="text/javascript">
		function closePop(){
			
			
		}
	</script>
</body>

</body>
</html>