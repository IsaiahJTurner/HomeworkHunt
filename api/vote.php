<?php
require_once("../functions.php");

function respondError($errorCode, $errorMessage) {
	die(json_encode(array("response" => array("code" => $errorCode, "message" => $errorMessage))));
}

$whack = new Whack();
$user = $whack->getProfileID();
if (!$user) {
    respondError(2, "You must log in to vote.");
}

$hw = intval($_POST['hw']);
if (!$whack->hasPurchased($user, $hw)) {
    respondError(3, "You must buy this item to vote.");
}
if ($_POST['isUpvote'] == "true") {
	$whack->vote($user, $hw, true);
	respondError(1, "Upvoted" );
} else {
	$whack->vote($user, $hw, false);
		respondError(1, "Downvoted");
}
