<p style="color:red;"> This site is under construction.
	Please Come back later when it is finished. </p>

<?php 
	$cdate = mktime(0, 0, 0, 5, 23, 2015, 0);
	$today = time();
	$difference = $cdate - $today;
	if ($difference < 0) { $difference = 0; }
	echo "<h1> There are ". floor($difference/60/60/24)." days remaining until the wedding.</h1>";
?>
	
<div id="menu">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="directions.php">Directions</a></li>
		<li><a href="registry.php">Registry</a></li>
		<li><a href="contact.php">Contact</a></li>
	</ul>
</div>
