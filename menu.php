
<?php
	$guestlist = array(
		array("Alexa Serrato", "Peter Andrien"),

		/*Peter's Relatives*/
		array("Debbie Andrien","Steve Andrien"),
		array("David Andrien","Marta Andrien"),
		array("Paul Andrien"),
		array("Vera Postula"),
		array("Kirk Huckabone"),
		array("Bev Smith","Scott Smith"),
		array("Bob Baumheckel","Lynne Baumheckel"),
		array("Maria Hertzberg"),

		/*Friends*/
		array("Calvin Maldonado", "May Lynn Forssen")
	);


function hasName() {
	return isset($_GET['First']) && isset($_GET['Last']);
}

function in_arrayi($needle, $haystack)
{
	return in_array(strtolower($needle), 
		array_map('strtolower', $haystack));
} 

function nameForm() {
	echo('Your IP is ');
	echo(getenv('REMOTE_ADDR'));

	echo('
	<h2>One Moment. Let\'s get your name...</h2>
	<form>
	First Name:<br>
	<input type="text" pattern="[a-zA-Z ]{1,20}" 
	title="Only enter A through Z characters" 
	name="First">
	<br>
	Last Name:<br>
	<input type="text" pattern="[a-zA-Z]{1,20}" 
		title="Only enter A through Z characters." name="Last">
	<br><br>
	<input type="submit" value="Lookup my name!">
	</form>');
}

function getParty(&$error=null) {	
	// Is the user logged in?
	if(hasName() == FALSE) {
		return FALSE;
	}
	
	// Is this input safe to prodeed:q
	if(!preg_match('/^[a-z]{1,20}$|^[a-z]{1,20} [a-z]{1,20}$/i', 
		$_GET['First'])) {
		$error="<p style='color:red'>Invalid first name format</p>";
		return FALSE;
	}

	if(!preg_match('/[a-z]{1,20}$/i',$_GET['Last'])) {
		$error ="<p style='color:red'>Invalid last name format</p>";
		return FALSE;
	}

	global $guestlist;
	// Do they match an entry in the guest list
	foreach ($guestlist as $party) {
		if (in_arrayi($_GET["First"]." ".$_GET["Last"], $party)) {
			return $party;
		}
	}

	$error = '<p style="color:red">The name you entered was not found.</p>';
	return FALSE;
}						

function unsafeGet() {
	return "?First=".urlencode($_GET["First"]).
		"&Last=".urlencode($_GET["Last"]);
}


function genGet() {
	if (getParty()) {
		echo "?First=".
			urlencode($_GET["First"]).
			"&Last=".
			urlencode($_GET["Last"]);
	} else {
		echo "";
	}
}

?>


<p style="color:red;"> This site is under construction.
	Please Come back later when it is finished. </p>

<div id="banner">
	<?php 
		$cdate = mktime(0, 0, 0, 5, 23, 2015, 0);
		$today = time();
		$difference = $cdate - $today;
		if ($difference < 0) { $difference = 0; }
		echo "<h1 style=\"color: #4b1577\">". 
			floor($difference/60/60/24).
			" days until the wedding.</h1>";
	?>
</div>
	
<div id="menu">
	<ul>
		<li><a href="/<?php genGet(); ?>">Home</a></li>
		<li><a href="about<?php genGet(); ?>">About</a></li>
		<li><a href="directions<?php genGet(); ?>">Directions</a></li>
		<li><a href="registry<?php genGet(); ?>">Registry</a></li>
		<li><a href="contact<?php genGet(); ?>">Contact</a></li>
		<li><a href="rsvp<?php genGet(); ?>">RSVP!</a></li>
	</ul>
</div>
