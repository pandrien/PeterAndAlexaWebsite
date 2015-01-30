<!DOCTYPE html>
<html>

<link href="default.css" rel="stylesheet" type="text/css">

<head>
  <meta charset="UTF-8">
  <title>Peter &amp; Alexa 2014</title>
</head>

<body>

<div id="wrap">
	<?php include("menu.php"); ?>

	<?php 
	function hasName() {
		return isset($_GET['First']) && isset($_GET['Last']);
	}

	function nameForm() {
		echo('
		<form action="rsvp.php">
		First Name:<br>
		<input type="text" name="First">
		<br>
		Last Name:<br>
		<input type="text" name="Last">
		<br><br>
		<input type="submit" value="Lookup">
		</form>');
	}

	function rsvpForm() {
		echo('<p style="color:red">testing</p>');
		echo('<p style="color:red">Name not found</p>');
		nameForm();
	}

	if(hasName() == TRUE) {
		rsvpForm();
	} else {
		nameForm();
	}

	?>
 

</div>

</body>

</html>









