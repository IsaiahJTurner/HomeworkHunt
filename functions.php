<?php
ini_set('display_errors', 'On');


require __DIR__.'/vendor/autoload.php';

use Aws\S3\S3Client;


require_once(__DIR__."/config.php");
require_once(__DIR__."/services/CloudConvert/api.php");

class Whack {

	// Authenticates a user.
	function login($login, $password) {
		$password_hashed = sha1($password);
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$login = mysqli_escape_string($mysqli,$login);
		$query = "SELECT `id` FROM `users` WHERE (`email` = '$login' OR `username` = '$login') AND `password` = '$password_hashed'";
		echo($query);
		$result = mysqli_query($mysqli, $query) or die("Error " . mysqli_error($mysqli));
		if (!$result) return false;
		if (mysqli_num_rows($result) == 0) return false;
		$array = mysqli_fetch_assoc($result);
		$user = $array["id"];
		$time = date('YmdHis');

		$sid = sha1($time + $user);
		$query_2 = "INSERT INTO `sessions` (`id`, `sid`) VALUES ('$user', '$sid')";
		setcookie("sid", $sid, 2147483647, "/");
		mysqli_query($mysqli, $query_2)  or die("Error " . mysqli_error($mysqli));

		return $array[0]["id"];
	}

	// Creates a new user.
	function register($username, $email, $password) {
		$password_hashed = sha1($password);
		$username = preg_replace("/[^A-Za-z0-9 ]/", '', $username);
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$email = mysqli_escape_string($mysqli,$email);
		$query = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password_hashed')";
		$result = mysqli_query($mysqli, $query)  or die("Error " . mysqli_error($mysqli));
		if (!$result) return false;
		return true;
	}

	// Shares homework.
	function share($user, $title, $description, $file) {
		$fileHash = sha1_file($file['tmp_name']);
		$fileName = $file['name'];
		$fileSize = $file['size'];
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$title_safe = mysqli_real_escape_string($mysqli,$title);
		$description_safe = mysqli_real_escape_string($mysqli,$description);
		$query = "INSERT INTO `submissions` (`user`, `title`, `description`,`hash`, `file`, `size`) VALUES ('$user', '$title_safe', '$description_safe', '$fileHash', '$fileName', '$fileSize')";
		$result = mysqli_query($mysqli, $query)  or die("Error " . mysqli_error($mysqli));


		$post = mysqli_insert_id($mysqli);
		$query_2 = "INSERT INTO `votes` (`user`, `post`, `isUpvote`) VALUES ('$user', '$post', '1')";
		mysqli_query($mysqli, $query_2);


		$s3 = S3Client::factory();
		$s3FileName = $fileHash.".".pathinfo($file['name'], PATHINFO_EXTENSION);
		$s3->putObject(array(
				'Bucket' => "TheHWHack",
				'Key'    => $s3FileName,
				'Body'   => fopen($file['tmp_name'], 'r+')
			));
		if (strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)) == "txt") {
			$fileContent = file_get_contents($file['tmp_name']);
			$this->proccessContent($post, $fileContent);
			return true;
		}
		
		$apikey = CLOUDCONVERT_KEY;
		$process = CloudConvert::createProcess(pathinfo($file['name'], PATHINFO_EXTENSION), "txt", $apikey);
		$fileURL = $s3->getObjectUrl(
			"TheHWHack",
			$s3FileName,
			'30 minutes',
			array(
				'ResponseContentDisposition' => 'attachment; filename="'.$fileName.'"'
			)
		);
		
		$process -> setOption("callback", SERVER_PROTOCOL."://".SERVER_HOSTNAME."/services/CloudConvert/callback?callback=true&secret=".CLOUDCONVERT_KEY."&hw=".$post);
		$process -> uploadByUrl($fileURL, $fileName, "txt");
		return true;
	}

	// Used for CloudConvert callback to allow easier search.
	function proccessContent($hw, $content) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$content_safe = mysqli_real_escape_string($mysqli, $content);
		$hw = intval($hw);
		$query = "UPDATE `submissions` SET `content` = '$content_safe' WHERE `id` = '$hw'";
		mysqli_query($mysqli, $query);

	}
	// Casts vote on a HW
	function vote($user, $post, $isUpvote = false) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$query = "INSERT INTO `votes` (`user`, `post`, `isUpvote`) VALUES ('$user', '$post', '$isUpvote') ON DUPLICATE KEY UPDATE `isUpvote` = VALUES(`isUpvote`)";
		$result = mysqli_query($mysqli, $query);
	}

	// Returns wether the user is allowed to vote.
	function canVote($user, $hw) {
		return true;
	}

	function hasPurchased($user, $item) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$query = "SELECT 1 FROM `purchases` WHERE `user` = '$user' AND `item` = '$item'";
		$result = mysqli_query($mysqli, $query);
		if (mysqli_num_rows($result) == 0) {
			return false;
		} else {
			return 1;
		}
	}
	function purchase($user, $item, $cost) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$query = "INSERT INTO `purchases` (`user`, `item`, `cost`, `downloads`) VALUES ('$user', '$item', '$cost', '1') ON DUPLICATE KEY UPDATE `downloads` = `downloads` + 1, `cost` = `cost` + '$cost'";
		$result = mysqli_query($mysqli, $query);
		return false;
	}

	function getPrice($item) {
		return 5;
	}
	// Returns a link to the hw.
	function getURL($item) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$item_safe = mysqli_real_escape_string($mysqli,$item);
		$query = "SELECT `hash`,`file` FROM `submissions` WHERE `id` = '$item_safe'";
		$result = mysqli_query($mysqli, $query);
		if (mysqli_num_rows($result) == 0) {
			return false;
		}
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
	function homework($id, $user = 0) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$id_safe = intval($id);
		$user = intval($user);
		$query = "SELECT * FROM `submissions` WHERE `id` = '$id_safe'";
		$result = mysqli_query($mysqli, $query) or die("Error " . mysqli_error($mysqli));
		if (mysqli_num_rows($result) == 0) {
			return false;
		}
		$hw = mysqli_fetch_assoc($result);


		$acct = $this->getUser($hw["user"]);
		$hw["by"] = $acct['username'];
		$hw["trusted"] = $acct["trusted"];


		$result_3 = mysqli_query($mysqli, "SELECT COALESCE(SUM(CASE WHEN `isUpvote` THEN 1 ELSE -1 END),0) AS rating FROM `votes` WHERE `post` = '$id_safe'") or die("Error " . mysqli_error($mysqli));
		$row_3 = mysqli_fetch_assoc($result_3);
		$hw["rating"] = $row_3['rating'];

		$result_4 = mysqli_query($mysqli, "SELECT `isUpvote` FROM `votes` WHERE `user` = '$user' AND `post` = '$id_safe'") or die("Error " . mysqli_error($mysqli));
		
		$row_4 = mysqli_fetch_assoc($result_4);
		if($user == 0 || empty($row_4['isUpvote']) ) {
			$hw["voteStatus"] = "never";
		} else if ($row_4['isUpvote'] == "1") {
				$hw["voteStatus"] = "upvoted";
			} else {
			$hw["voteStatus"] = "downvoted";
		}


		$hw["cost"] = $this->getPrice($id);
		return $hw;
	}
	// Returns an array of user params. New params may be added at any time but old ones will not be removed.
	function getUser($user) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));

		$user = intval($user);
		$result = mysqli_query($mysqli, "SELECT `trusted`,`username` FROM `users` WHERE `id` = '$user'")  or die("Error " . mysqli_error($mysqli));
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	// Returns search results for the query string.
	function search($q) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$q_safe = mysqli_real_escape_string($mysqli,$q);
		$query = "SELECT `id`,`title`,`description` FROM `submissions` WHERE `title` LIKE '%$q_safe%' OR `description` LIKE '%$q_safe%'";
		$result = mysqli_query($mysqli, $query) or die("Error " . mysqli_error($mysqli));
		if (!$result) return false;
		if (mysqli_num_rows($result) == 0) {
			return false;
		}

		while ($row = mysqli_fetch_assoc($result)) {
			$results[] = $row;
		}
		return $results;
	}
	function getProfile($user) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$query = "SELECT `id`,`username`,`email` FROM `users` WHERE `id` = '$user'";
		$result = mysqli_query($mysqli, $query) or die("Error " . mysqli_error($mysqli));
		$array = mysqli_fetch_assoc($result);


		$query_2 = "SELECT a.id,a.title,COALESCE(SUM(CASE WHEN b.isUpvote THEN 1 ELSE -1 END),0) AS rating,COALESCE(SUM(c.`downloads`),0) AS downloads FROM submissions AS a LEFT JOIN votes AS b ON b.post = a.id LEFT JOIN purchases AS c ON c.item = a.id WHERE a.`user` = '$user' GROUP BY a.id";
		$result_2 = mysqli_query($mysqli, $query_2) or die("Error " . mysqli_error($mysqli));
		$posts = array();
		while($post = mysqli_fetch_assoc($result_2)) {
			$posts[] = $post;
		}
		$array['posts'] = $posts;

		return $array;
	}


	function getProfileID() {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		if(!isset($_COOKIE['sid'])){
			return false;
		}
		$sid = mysqli_real_escape_string($mysqli,$_COOKIE['sid']);
		$query = "SELECT `id` FROM `sessions` WHERE `sid` = '$sid'";
		$result = mysqli_query($mysqli, $query) or die("Error " . mysqli_error($mysqli));
		if (!$result) return false;
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}


	function creditsRemaining($user) {
		return 5;
	}
}
