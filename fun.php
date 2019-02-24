<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>fun</title>
 </head>
 <body>
 <?php 
 		echo "My name is " . $_SESSION['name'];
  ?>
 </body>
 </html>