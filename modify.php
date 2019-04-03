<?php 
	session_start();
	$login = $_SESSION['login'];
	$un = $_SESSION['username'];
	if ($login == 1) {

		$id = $_GET['id'];

		$dbname = "product_tracker";
		$conn = mysqli_connect("localhost", "root", "", $dbname);

		$name = $_POST['name'];
		$price = $_POST['price'];
		$quant = $_POST['quant'];
		$cond = $_POST['cond'];
		//echo $name . " " . $price . " " . $quant . " " . $cond;
		$sql = "UPDATE " . $un . "_products SET item_name = '$name', item_price = '$price', item_quantity = '$quant', item_condition = '$cond' WHERE item_id = $id"; 
		echo $sql;
		if (mysqli_query($conn, $sql)) {
		    mysqli_close($conn);
		    $_SESSION['refresh'] = 1;
		    echo "<script>window.close();</script>";
		}
		else {
		    echo "Error modifying record";
		}		
	}
	





 ?>
