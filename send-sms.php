<?php
 
error_reporting(-1); ini_set('display_errors', 1); ini_set('html_errors', 1);


require "Services/Twilio.php";


//$groupID = $_POST['groupID'];

$body = $_POST['body'];

// set your AccountSid and AuthToken from www.twilio.com/user/account
/*
$AccountSid = "ACe15e5989ade4c042ec615602ee4ef856";
$AuthToken = "c8ff67c20ffd18c48ae65ec15c56ce50";

 
 
$client = new Services_Twilio($AccountSid, $AuthToken);

 

$numbers = ["+355699100429", "+355699100430"];

foreach ($numbers as $num) {
	$message = $client->account->messages->create("+15005550006", $num, $body, array());

	 echo 4;
 
// Display a confirmation message on the screen
echo "Sent message {$message->sid}";
}
 
*/

//$sid = "ACe15e5989ade4c042ec615602ee4ef856"; 
//$token = "c8ff67c20ffd18c48ae65ec15c56ce50"; 

$sid = "ACf4e931f5c0f3cac9cb0cc4d141a33c6e"; 
$token = "8fd53412dadbdd979921c704cefe450b";

$client = new Services_Twilio($sid, $token);
 
$sms = $client->account->sms_messages->create("+19492673094", "+355699100429", $body, array());
echo $sms->sid;


?>