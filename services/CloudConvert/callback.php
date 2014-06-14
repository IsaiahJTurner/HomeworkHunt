<?php
require_once(__DIR__."/../../config.php");

if (empty($_REQUEST['secret'])) {
	die("Please set the secret.");
}

if ($_REQUEST['secret'] != CLOUDCONVERT_SECRET) {
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

    // check the status
    $status = $process -> status();

    if ($status -> step == 'finished') {
        // it worked. download it
        $process -> download('output.pdf');

        // update the DB etc

    } else {
        // it failed. get the error message: $status -> message;
    }

    // maybe delete process from CloudConvert
    // $process -> delete();

} else {
    // start the conversion

    // insert your API key here
    $apikey = CLOUDCONVERT_KEY;

    $process = CloudConvert::createProcess("png", "pdf", $apikey);

    // set some options here...
    // $process -> setOption("email", "1");

    // insert (public) URLs here
    $process -> setOption("callback", "http://".SERVER_HOSTNAME."/services/CloudConvert/callback?callback=true&secret=".CLOUDCONVERT_SECRET);
    $process -> uploadByUrl("http://_INSERT_PUBLIC_URL_TO_INPUT_FILE_/input.png", "input.png", "pdf");

    echo "Conversion was started in background :-)";
}
