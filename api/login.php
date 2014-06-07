<?php
require_once("../functions.php");
$whack = new Whack();
function respond($code, $message) {
	if ($code == 1) header("Location: /share"); else header("Location: /login");
	die(json_encode(array("code" => $code, "message" => $message)));
}

if ($whack->getProfileID()) {
	respond(2, "You are already logged in.");
}

$sid = $whack->login($_POST['login'], $_POST['password']);
if (!$sid) respond(3, "Invalid login.");
respond(1, "You have been logged in.");