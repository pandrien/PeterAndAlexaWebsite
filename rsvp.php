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

	echo("<form action='email.php'method='post'>");
	foreach ($people as $name) {
		echo("<b>".$name."</b>");
		echo("<br>Will Attend?  <input type='checkbox' name='".$name."Attend'> 
			Special dietary needs? <input type='text' name='".$name."Food'><br>");
	}
	echo("<input type='submit' value='Submit'");
}

rsvp();

?>

</div>

</body>

</html>
