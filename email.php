<!DOCTYPE html>
<html>

<link href="default.css" rel="stylesheet" type="text/css">

<head>
  <meta charset="UTF-8">
  <title>Peter &amp; Alexa 2014</title>
</head>

<body>

<div id="wrap">

<?php 
include("menu.php"); 

$message = '';

foreach ($_POST as $key => $val) {
	$message .= $key." = ".$val."\n";
}

if(mail('pand1024@gmail.com','Someone sent their RSVP!',$message)) {
	echo "<h1>Form Summited!</h1>";
} else {
	echo "<p>Just kidding. Something went wrong. :P</p>";
}

?>


</div>

</body>

</html>
