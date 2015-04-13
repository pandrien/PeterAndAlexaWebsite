<!DOCTYPE html>
<html>
<link href="default.css" rel="stylesheet" type="text/css">

<head>

<meta charset="UTF-8">
<title>Peter &amp; Alexa 2015</title>
</head>

<body>
<div id="wrap">

<?php
include("menu.php");

require_once "Mail.php";
$from = "Peter Andrien <pand1024wedding@gmail.com>";
$to = "Peter Andrien <pand1024@gmail.com>";
$subject = "Someone sent you an RSVP";
$body = "";
foreach ($_POST as $key => $val) {
	$body .= $key." = ".$val."\n";
}

$host = "smtp.googlemail.com";
$port = "587";
$username = "pand1024wedding@gmail.com";
$password = "3feethigh";
$headers = array ('From' => $from,
	'To' => $to,
	'Subject' => $subject);
	$smtp = Mail::factory('smtp',
	array ('host' => $host,
		'port' => $port,
		'auth' => true,
		'username' => $username,
		'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
	echo("<p>" . $mail->getMessage() . "</p>");
} else {
	echo("<p>Message successfully sent!</p>");
}
?>

</div>
</body>
</html>
