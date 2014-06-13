<?php
require_once("../functions.php");
header('Content-Type: application/json');
function respond($errorCode, $errorMessage) {
	die(json_encode(array("response" => array("code" => $errorCode, "message" => $errorMessage))));
}

$whack = new Whack();
$user_id = $whack->getProfileID();
if (!$user_id) {
	respond(2, "You must log in to download files.");
}
$hw = intval($_POST['hw']);
$price = $whack->getPrice($hw);
if ($whack->creditsRemaining($user_id) < $price) {
	respond(4, "Insufficient credits.");
}

$whack->purchase($user_id, $hw, $price);

$downloadLink = $whack->getURL($hw);
if (!$downloadLink) {
	respond(3, "Homework not found.");
}
respond(1, $downloadLink);