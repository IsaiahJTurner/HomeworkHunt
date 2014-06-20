<?php
require_once("functions.php");
$whack = new Whack();
$whack->sendConfirmationEmail(2);
echo("worked");