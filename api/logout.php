<?php
setcookie("sid", "", time()-3600, "/");
header("Location: /login");
die("You have been logged out.");