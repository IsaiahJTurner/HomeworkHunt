<?php
require_once("../functions.php");
$whack = new Whack();
$user = $whack->getProfileID();
if (!$user) {
    header("Location: /register");
    die("You need to login to share your homework.");
}
function respondError($errorCode, $errorMessage) {
	die(json_encode(array("error" => array("code" => $errorCode, "message" => $errorMessage))));
}
$title = $_POST['title'];
$description = $_POST['description'];
$file = $_FILES['file'];
if (strlen($title) > 255) {
	respondError(3, "Title too long.");
}
if ($file['error'] > 0) respondError($_FILES['file']['error'], "Error uploading file.");

$whack->share($user, $title, $description, $file);
