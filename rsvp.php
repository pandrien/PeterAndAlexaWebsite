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

function rsvp() {
	$people = getParty();
	if(!$people) {
		nameForm();
		return;
	}

	echo("<p>Thank you for visiting our website. Take a momment to fill out
		information for each of the following people.<p>");

	echo("<form>");
	foreach ($people as $name) {
		echo($name);
		echo("<br><input><br>");
	}
}

rsvp();

?>

</div>

</body>

</html>
