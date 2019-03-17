<!DOCTYPE html>
<html>
<head>
	<title>sending</title>
</head>
<body>
	<?php 
		$emailAddress = $_POST['email'];

		$subject = "this is merely a test";

		$message = '<p>Thanks for testing out our email feature<p>';

		$headers = "From: The Sender <sender@yahoo.com>\r\n";
		$headers .= "Reply-To: replyto@yahoo.com\r\n";
		$headers .= "Content-type: text/html\r\n";

		mail($emailAddress, $subject, $message, $headers);

	 ?>
</body>
</html>