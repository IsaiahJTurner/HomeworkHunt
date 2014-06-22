<?php
require_once("functions.php");
$whack = new Whack();
$success = $whack->confirmUser($_GET['user'], $_GET['code']);
if (!$success) {
	die("Invalid confirmation code.");
}
header("Location: /account");
die("Your email has been confirmed. You may now visit your account.");