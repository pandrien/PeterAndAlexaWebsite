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
	$err = "";
	$people = getParty($err);
	if(!$people) {
		echo($err);
		nameForm();
		return;
	}

	echo("<p>Thank you for visiting our website. Take a momment to fill out
		information for each of the following people.<p>");


	echo("<form action='email.php".unsafeGet()."' method='post'>");
	foreach ($people as $name) {
		echo("<b>".$name."</b>");
		echo("<br>Will Attend?  
				<input type='hidden' value='0' name='".$name."'>
				<input type='checkbox' name='".$name."'><br><br>");
	}
	echo("<br><input type='submit' value='Submit'></form>");
}

rsvp();

?>

</div>

</body>

</html>
