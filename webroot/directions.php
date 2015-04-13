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

function directions() {
	$people = getParty();
	if(!$people) {
		nameForm();
		return;
	}

	echo "<p>We are so excited to see you all at our wedding.
		Below you should find all the information you need.</p>";

	echo " 
	<h1>The Church</h1>

	<h2>11:00 AM - 11:45 AM</h2>
	<p>First Presbyterian Church</p>
	<p>2001 S. El Camino Real</p>
	<p>Oceanside, CA 92054</p>

	<iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3338.8373709863376!2d-117.32911899999998!3d33.192136999999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x10b19fe94a262b56!2sPresbyterian+Church+(U.S.A.)%3A+Oceanside+First+Presbyterian+Church!5e0!3m2!1sen!2sus!4v1422713244960' width='400' height='300' frameborder='0' style='border:0'></iframe>
	<a href='https://goo.gl/maps/rDKoG'>Google Maps</a>

	<h1>The Reception</h1>
	<h2>12:00 PM - 3:00 PM</h2>
	<p>Courtyard San Diego Oceanside</p>
	<p>3501 Seagate Way</p>
	<p>Oceanside, CA 92056</p>

	<iframe src='https://www.google.com/maps/embed?pb=!1m29!1m12!1m3!1d13354.39518636752!2d-117.32642933257057!3d33.19839468810072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m14!1i0!3e0!4m5!1s0x80dc719730bb4b19%3A0x10b19fe94a262b56!2sFirst+Presbyterian+Church%2C+South+El+Camino+Real%2C+Oceanside%2C+CA!3m2!1d33.192136999999995!2d-117.32911899999999!4m5!1s0x80dc710e9a18e4d5%3A0x3578583839b23bfe!2sCourtyard+San+Diego+Oceanside%2C+3501+Seagate+Way%2C+Oceanside%2C+CA+92056!3m2!1d33.206672999999995!2d-117.31039299999999!5e0!3m2!1sen!2sus!4v1422716321642' width='400' height='300' frameborder='0' style='border:0'></iframe>

	";
}

directions();

?>

</div>

</body>

</html>
