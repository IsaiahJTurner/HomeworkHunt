<?php
require_once("functions.php");
$whack = new Whack();
$whack->confirmUser($_GET['user'], $_GET['code']);
echo("worked");