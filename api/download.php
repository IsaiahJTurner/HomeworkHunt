<?php
require_once("../functions.php");
header('Content-Type: application/json');
function respond($errorCode, $errorMessage) {
	die(json_encode(array("response" => array("code" => $errorCode, "message" => $errorMessage))));
}

$whack = new Whack();
$user = $whack->getProfileID();
if (!$user) {
	respond(2, "You must log in to download files.");
}
$hw = intval($_POST['hw']);
if (!$whack->hasPurchased($user, $hw)) {
	// spend credits
}
$downloadLink = $whack->getURL($hw);
if (!$downloadLink) {
	respond(3, "Homework not found.");
}
respond(1, $downloadLink);