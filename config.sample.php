<?php
// Create a bucket on S3 titled "TheHWHack" and enter credentials for access below.
$_SERVER['AWS_ACCESS_KEY_ID'] = "XXXXXXXXXXXXXXXXXXX";
$_SERVER['AWS_SECRET_KEY'] = "XXXXXXXXXXXXXXX/XXXXXXXXX+XXXXXXXXXXXXXX";

// Enter your MySQL configuration below.
define("DB_USERNAME", "root");
define("DB_PASSWORD", "password");
define("DB_HOSTNAME", "localhost");
define("DB_NAME", "homeworkhunt");

// This should be very complex as it allows direct database modification on the server. If this is leaked, it would be very easy to modify `submissions.content` in the database. No other data can be modified with this key. I personally use an RSA 4096 key but going to https://api.wordpress.org/secret-key/1.1/salt/ & copying one of the keys should work. This key will be passed over HTTP.
define("CLOUDCONVERT_SECRET", "^m8++KBZ(&n%!g:VF?z-Gg]e=8[Pjb)l4LM[T_eMi[kl:f5*e:=ei(^HR_3!D%m1");
// This is the CloudConvert API key that can be attained by visiting their website and signing up.
define("CLOUDCONVERT_KEY", "w-YyInHEiCGpCRpBUsxi8M_vKxkodZ9mNjQLqOUWllI8gmuSk3pvb9w2ZGHMaIdRWTve0ivTF2ijizKyFhJmLA");

// Where is your server hosted? This is used for callbacks (such as CloudConvert's) and must be accessable remotely.
define("SERVER_HOSTNAME", "homeworkhunt.com");
// Does the above hostname allow for https connections?
define("SERVER_USE_HTTPS", false);
