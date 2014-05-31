<?php

function respondError($errorCode, $errorMessage) {
	die(json_encode(array("error" => array("code" => $errorCode, "message" => $errorMessage))));
}


if ($_FILES['file']['error'] > 0) respondError($_FILES['file']['error'], "Error uploading file.");

$newFileName = hash('sha512', file_get_contents($_FILES['file']['tmp_name'])) + pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

move_uploaded_file($_FILES['file']['tmp_name'], "files/" + $newFileName);
$mysql_con = mysqli_connect("localhost","whack","lbruxfrdseae","homework_db") or respondError(1, "Database connection error.");
$filename = mysqli_real_escape_string($mysql_con, $newFileName);
$description = mysqli_real_escape_string($mysql_con,$_POST['description']);
mysqli_select_db($mysql_con,"homework_db");
mysqli_query($mysql_con,"INSERT INTO testable (filename,description) VALUES ('$filename','$description');");
mysqli_close($mysql_con);
