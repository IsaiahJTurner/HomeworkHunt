<?php
require_once(__DIR__."/../../functions.php");
$whack = new Whack;
if (empty($_REQUEST['secret'])) {
	die("Please set the secret.");
}

if ($_REQUEST['secret'] != CLOUDCONVERT_KEY) {
die($_REQUEST['secret']." is invalid. Try url encoding it.");
}
// for testing it could be helpful...
ini_set('display_errors', 1);

require_once 'api.php';

// if callback was triggered by CloudConvert
if (!empty($_REQUEST['callback'])) {
    // conversion should be finished!
    // see: https://cloudconvert.org/page/api#callback
    $process = CloudConvert::useProcess($_REQUEST['url']);

    $status = $process -> status();
    if ($status -> step == 'finished') {
        $content = $process -> download();
		
        $whack->proccessContent($_REQUEST['hw'], $content);

    } else {
        error_log("CloudConvert Error Message: ".$status -> message);
    }
    $process -> delete();

} else {
	die("This does not look like a callback");
}
