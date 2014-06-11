<?php
ini_set('display_errors', 'On');


require 'vendor/autoload.php';

use Aws\S3\S3Client;


$_SERVER['AWS_ACCESS_KEY_ID'] = "AKIAJNBICZKD35BRHN5A";
$_SERVER['AWS_SECRET_KEY'] = "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";

define("DB_USERNAME", "root");
define("DB_PASSWORD", "F>L2}M9*8%7]B6F");
define("DB_HOSTNAME", "thehwhack.cnsesznixrz2.us-west-2.rds.amazonaws.com");
define("DB_NAME", "thehwhack");

class Whack {

	// Authenticates a user.
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

	// Creates a new user.
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

	// Shares homework.
	function share($user, $title, $description, $file) {
		$fileHash = sha1_file($file['tmp_name']);
		$fileName = $file['name'];
		$fileSize = $file['size'];
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
		$title_safe = mysqli_real_escape_string($mysqli,$title);
		$description_safe = mysqli_real_escape_string($mysqli,$description);
		$query = "INSERT INTO `submissions` (`user`, `title`, `description`,`hash`, `file`, `size`) VALUES ('$user', '$title_safe', '$description_safe', '$fileHash', '$fileName', '$fileSize')";
		$result = mysqli_query($mysqli, $query);

		$s3 = S3Client::factory();
		$s3->putObject(array(
				'Bucket' => "TheHWHack",
				'Key'    => $fileHash.".".pathinfo($file['name'], PATHINFO_EXTENSION),
				'Body'   => fopen($file['tmp_name'], 'r+')
			));
		return true;
	}

	// Casts vote on a HW
	function vote($user, $post, $isUpvote = false) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
			$query = "INSERT INTO `votes` (`user`, `post`, `isUpvote`) VALUES ('$user', '$post', '$isUpvote') ON DUPLICATE KEY UPDATE `isUpvote` = VALUES(`isUpvote`)";
		$result = mysqli_query($mysqli, $query);
	}

	// Returns wether the user is allowed to vote.
	function canVote($user, $hw) {
		return true;
	}
	
	function hasPurchased($user, $item) {
		return true;
	}
	
	// Returns a link to the hw.
		function getURL($item) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
		$item_safe = mysqli_real_escape_string($mysqli,$item);
		$query = "SELECT `hash`,`file` FROM `submissions` WHERE `id` = '$item_safe'";
		$result = mysqli_query($mysqli, $query);
		$row = mysqli_fetch_assoc($result);
		$s3 = S3Client::factory();
		return $s3->getObjectUrl(
			"TheHWHack",
			$row['hash'].".".pathinfo($row['file'], PATHINFO_EXTENSION),
			'5 minutes',
			array(
				'ResponseContentDisposition' => 'attachment; filename="'.$row['file'].'"'
			)
		);
	}

	// Returns an array of information pertaining to a homework assignment
	function homework($id) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
		$id_safe = mysqli_real_escape_string($mysqli,$id);
		$query = "SELECT * FROM `submissions` WHERE `id` = '$id_safe'";
		$result = mysqli_query($mysqli, $query);
		if (!$result) return false;
		$hw = mysqli_fetch_assoc($result);
		
		
		$user = $hw["user"];
		$result_2 = mysqli_query($mysqli, "SELECT `trusted`,`username` FROM `users` WHERE `id` = '$user'");
		$row_2 = mysqli_fetch_assoc($result_2);
		$hw["by"] = $row_2['username'];
		$hw["trusted"] = $row_2["trusted"];
		
		
		$result_3 = mysqli_query($mysqli, "SELECT COALESCE(SUM(CASE WHEN `isUpvote` THEN 1 ELSE -1 END),0) AS rating FROM `votes` WHERE `post` = '$id_safe'");
		$row_3 = mysqli_fetch_assoc($result_3);
		$hw["rating"] = $row_3['rating'];
		
		
		return $hw;
	}

	// Returns search results for the query string.
	function search($q) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
		$q_safe = mysqli_real_escape_string($mysqli,$q);
		$query = "SELECT `id`,`title`,`description` FROM `submissions` WHERE `title` LIKE '%$q_safe%' OR `description` LIKE '%$q_safe%'";
		$result = mysqli_query($mysqli, $query);
		if (!$result) return false;
		if (mysqli_num_rows($result) == 0) {
			return false; }

		while ($row = mysqli_fetch_assoc($result)) {
			$results[] = $row;
		}
		return $results;
	}

	function getProfileID() {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));
		if(!isset($_COOKIE['sid'])){
			return false;
		}
		$sid = mysqli_real_escape_string($mysqli,$_COOKIE['sid']);
		$query = "SELECT `id` FROM `sessions` WHERE `sid` = '$sid'";
		$result = mysqli_query($mysqli, $query);
		if (!$result) return false;
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}

	function availableCreditsCount() {
		return 0;
	}
}
