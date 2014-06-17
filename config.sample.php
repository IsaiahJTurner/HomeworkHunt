<?php
// Create a bucket on S3 titled "TheHWHack" and enter credentials for access below.
$_SERVER['AWS_ACCESS_KEY_ID'] = "XXXXXXXXXXXXXXXXXXX";
$_SERVER['AWS_SECRET_KEY'] = "XXXXXXXXXXXXXXX/XXXXXXXXX+XXXXXXXXXXXXXX";

// Enter your MySQL configuration below.
define("DB_USERNAME", "root");
define("DB_PASSWORD", "password");
define("DB_HOSTNAME", "localhost");
define("DB_NAME", "homeworkhunt");

// This is the CloudConvert API key that can be attained by visiting their website and signing up.
define("CLOUDCONVERT_KEY", "w-YyInHEiCGpCRpBUsxi8M_vKxkodZ9mNjQLqOUWllI8gmuSk3pvb9w2ZGHMaIdRWTve0ivTF2ijizKyFhJmLA");

// Where is your server hosted? This is used for callbacks (such as CloudConvert's) and must be accessable remotely.
define("SERVER_HOSTNAME", "homeworkhunt.com");
// Does the above hostname allow for https connections?
define("SERVER_PROTOCOL", "HTTP");
