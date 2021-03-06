<?php
header("Access-Control-Allow-Origin: http://chill.homeworkhunt.com");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

header("Content-Type: application/json");

require_once("../functions.php");
$whack = new Whack();
function respond($code, $message) {
	die(json_encode(array("code" => $code, "message" => $message)));
}
$user = $whack->getProfileID();
if ($user == 0) {
	respond(2, "Not logged in.");
}
$acct = $whack->getUser($user);
respond(1, $acct['username']);