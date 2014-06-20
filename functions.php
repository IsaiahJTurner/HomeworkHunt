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
		$login_safe = mysqli_escape_string($mysqli,$login);
		$query = "SELECT `id` FROM `users` WHERE (`email` = '$login_safe' OR `username` = '$login_safe') AND `password` = '$password_hashed'";
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
	function sendConfirmationEmail($user) {
		$user = intval($user);
		$user_info = $this->getUser($user);
		if ($user_info['confirmed'] == 1) return;
		
		$sendgrid = new SendGrid(SENDGRID_USERNAME, SENDGRID_PASSWORD);
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		
		$code = sha1($user.EMAIL_CONFIRMATION_KEY);
		
		// Substitute the strings
		$html = file_get_contents(__DIR__."/email/template.html");
		$html = str_replace("[resources_url]", SERVER_PROTOCOL."://".SERVER_HOSTNAME."/email", $html);
		$html = str_replace("[page_url]", SERVER_PROTOCOL."://".SERVER_HOSTNAME, $html);
		$html = str_replace("[chill_url]", CHILL_PROTOCOL."://".CHILL_SUBDOMAIN, $html);
		$html = str_replace("[confirm_link]", SERVER_PROTOCOL."://".SERVER_HOSTNAME."/confirm?user=".$user."&code=".$code, $html);
		
		
		$email = new SendGrid\Email();
		$email->addTo($user_info['email'])->
			setFrom('confirm@homeworkhunt.com')->
			setSubject('Welcome to Homework Hunt!')->
			setText('Welcome to Homework Hunt\nJust one more step.\nConfirm your account to start downloading from the fastest growing community of students exchanging homework.\n')->
			setHtml($html)->
			setFromName('Homework Hunt');
		$sendgrid->send($email);
		return;
	}
	function confirmUser($user,$code) {
		if (sha1($user.EMAIL_CONFIRMATION_KEY) != $code) return false;
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$user = intval($user);
		$query = "UPDATE `users` SET `confirmed` = '1' WHERE `user` = '$user'";
		mysqli_query($mysqli, $query);
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
		$this->sendConfirmationEmail(mysqli_insert_id($mysqli));
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
		$result = mysqli_query($mysqli, "SELECT `trusted`,`username`,`email`,`confirmed` FROM `users` WHERE `id` = '$user'")  or die("Error " . mysqli_error($mysqli));
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
		$array = $this->getUser($user);
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		// Get the posts for the user
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
	// Returns a count of how many pages posts will take up on the sitemap.
	function sitemapePages() {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$query = "SELECT COUNT(1) as total FROM `submissions`";
		$result = mysqli_query($mysqli, $query) or die("Error " . mysqli_error($mysqli));
		$row = mysqli_fetch_assoc($result);
		$totalCount = $row['total'];
		return ceil($totalCount/50000);
	}
	// Returns HW ID's for each of the
	function sitemapPage($page) {
		$mysqli = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($mysqli));
		$skip = ($page-1)*50000;
		$query = "SELECT `id`,UNIX_TIMESTAMP(`updated`) as updated FROM `submissions` LIMIT $skip,50000";
		$result = mysqli_query($mysqli,$query);
		$posts = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			$posts[$id] = $row['updated'];
		}
		return $posts;
	}

	function creditsRemaining($user) {
		return 5;
	}
}
