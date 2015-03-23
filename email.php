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

$url = 'https://api.sendgrid.com/';
$user = 'azure_d7a00faebedbac4f2e26a151f8220507@azure.com';
$pass = 'PF4m922FC4bZv1L'; 

$body = "";
 
foreach ($_POST as $key => $val) {
	$body .= $key." = ".$val."\n";
}

$params = array(
     'api_user' => $user,
     'api_key' => $pass,
     'to' => 'pand1024@gmail.com',
     'subject' => 'RSVP',
     'html' => $body,
     'text' => $body,
     'from' => 'anna@contoso.com',
);

$request = $url.'api/mail.send.json';
 // Generate curl request
$session = curl_init($request);
 // Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
 // Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
 // Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 // obtain response
$response = curl_exec($session);
curl_close($session);
 // print everything out
print_r($response);

?>

</div>

</body>

</html>
