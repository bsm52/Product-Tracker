<?php 
	session_start();
	$un = $_SESSION['username'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Item</title>
</head>
<body>
<?php 
	$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$dbname = "product_tracker";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM " . $un . "_products WHERE item_id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: viewItems.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}

 ?>
</body>
</html>