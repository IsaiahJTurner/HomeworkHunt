<?php
/* commented until it works, don't touch this file.
function respond($errorCode, $errorMessage) {
	die(json_encode(array("response" => array("code" => $errorCode, "message" => $errorMessage))));
}

$whack = new Whack();
$user = $whack->getProfileID();
if (!$user) {
    respondError(2, "You must log in to download files.");
}
$hw = intval($_POST['hw']);
if ($_POST['isUpvote'] == "true") {
	$whack->vote($user, $hw, true);
	respondError(1, "Upvoted" );
} else {
	$whack->vote($user, $hw, false);
		respondError(1, "Downvoted");
}





$whack = new Whack();
$downloadLink = $whack->getURL($_POST['id']);
echo($downloadLink);
if (!$downloadLink) {
	header("Location: /login");
	die("You need to log in to download this file.");
}

header("Location: $downloadLink");
die("<a href='$downloadLink'>$downloadLink</a>");
print_r($_POST);
