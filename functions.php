<?php
define("S3_USERNAME", "TheHWHack");
define("S3_ACCESS_KEY_ID", "AKIAJNBICZKD35BRHN5A");
define("S3_SECRET_ACCESS_KEY", "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");

define("DB_USERNAME", "root");
define("DB_PASSWORD", "F>L2}M9*8%7]B6F");
define("DB_HOSTNAME", "thehwhack.cnsesznixrz2.us-west-2.rds.amazonaws.com");
define("DB_NAME", "thehwhack");

class Whack {

	function login($login, $password) {
		$password_hashed = sha1($password);
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
		$login = mysqli_escape_string($mysqli,$login);
		$query = "SELECT `id` FROM `users` WHERE (`email` = '$login' OR `username` = '$login') AND `password` = '$password_hashed'";
		$result = mysqli_query($mysqli, $query);
		if (!$result) return false;
		$array = mysqli_fetch_array($result);
		$user_id = $array[0]["id"];
		$time = date('YmdHis');

		$sid = sha1($time + $user_id);
		$query_2 = "INSERT INTO `sessions` (`id`, `sid`) VALUES ('$user_id', '$sid')";
		setcookie("sid", $sid, 2147483647, "/");
		mysqli_query($mysqli, $query_2);

		return $array[0]["id"];
	}

	function register($username, $email, $password) {
		$password_hashed = sha1($password);
		$username = preg_replace("/[^A-Za-z0-9 ]/", '', $username);
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
		$email = mysqli_escape_string($mysqli,$email);
		$query = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password_hashed')";
		$result = mysqli_query($mysqli, $query);
		if (!$result) return false;
		return true;
	}

	function share($user_id, $title, $description, $file) {
		
	}
	
	function vote($isUpvote = 0) {
		
	}
	
	function download() {
		
	}
	
	function getProfileID() {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
		if(!isset($_COOKIE['sid'])){
			return false;
		}
		$sid = mysqli_real_escape_string($mysqli,$_COOKIE['sid']);
		$query = "SELECT `id` FROM `sessions` WHERE `sid` = '$sid'";
		$result = mysqli_query($mysqli, $query);
		$row = mysqli_fetch_array($result);
		return $row[0]["sid"];
	}
	
	function availableCreditsCount() {
		return 0;
	}
}
