<?php
require_once("../functions.php");

function respondError($errorCode, $errorMessage) {
	die(json_encode(array("error" => array("code" => $errorCode, "message" => $errorMessage))));
}

$whack = new Whack();
$user = $whack->getProfileID();
if (!$user) {
    respondError(3, "You must log in to vote.");

}
$hw = intval($_POST['hw']);
if (!$whack->canVote($user, $hw)) respondError(2, "Your vote has already been cast.");



if ($_POST['isUpvote']) {
	$whack->vote(true);
} else {
	$whack->vote(false);
}