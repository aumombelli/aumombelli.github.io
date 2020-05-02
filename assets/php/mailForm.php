
<?php

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function IsEmail($email)
	{
		$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:(?:(?:[01]?\d1,2|2[0−4]\d|25[0−5])\.)3(?:[01]?\d1,2|2[0−4]\d|25[0−5])))$/', $email);

		return (($value === 0) || ($value === false)) ? false : true;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = test_input($_POST["email"]);
		if (IsEmail($email))
		{
			$name = test_input($_POST["name"]);
			$message = test_input($_POST["message"]);

			$email_from = "aumombelli.github.io";

			$email_subject = "New Form submission";

			$email_body = "You have received a new message from the user $name.\n".
								"Here is the message:\n $message".

			$to = "mombelli.aurelien@gmail.com";

			$headers = "From: $email_from \r\n";

			$headers .= "Reply-To: $visitor_email \r\n";

			mail($to,$email_subject,$email_body,$headers);
		}
	}

?>

