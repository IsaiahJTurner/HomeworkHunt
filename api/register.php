<?php
require_once("../functions.php");
$whack = new Whack();
function respond($code, $message) {
	if ($code == 1) header("Location: /share"); else header("Location: /register");
	die(json_encode(array("code" => $code, "message" => $message)));
}

if ($whack->getProfileID()) {
	respond(2, "You are already logged in.");
}

$result = $whack->register($_POST['username'], $_POST['email'], $_POST['password']);
if (!$result) respond(3, "Oops, this account already exists.");
respond(1, "You have been logged in.");