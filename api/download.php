<?php
require_once("../functions.php");
$whack = new Whack();
$downloadLink = $whack->download($_POST['id']);
echo($downloadLink);
if (!$downloadLink) {
	header("Location: /login");
	die("You need to log in to download this file.");
}

header("Location: $downloadLink");
die("<a href='$downloadLink'>$downloadLink</a>");
print_r($_POST);
