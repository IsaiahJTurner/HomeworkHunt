<?php
if (substr_count($_SERVER['REQUEST_URI'], "/") != 2) die("Homework not found");
$hwID = end(explode('/', $_SERVER['REQUEST_URI']));
require_once("functions.php");
$whack = new Whack();
$user_id = $whack->getProfileID();
$hw = $whack->homework($hwID, $user_id);
$hasPurchased = $whack->hasPurchased($user_id, $hwID);
if ($hw == false) die("Homework not found");
function formatBytes($bytes, $precision = 2) {
	$units = array('B', 'KB', 'MB', 'GB', 'TB');

	$bytes = max($bytes, 0);
	$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
	$pow = min($pow, count($units) - 1);

	// Uncomment one of the following alternatives
	// $bytes /= pow(1024, $pow);
	// $bytes /= (1 << (10 * $pow));

	return round($bytes, $precision) . ' ' . $units[$pow];
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Homework Hunt, hw hunt, answers, homework, essays, papers, projects, hw">
    <meta name="description" content="Find answers to any class assignment shared by users like you! Fuel the community, upload your answers today! It's free!">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <title><?php echo(htmlspecialchars($hw['title'])); ?></title>
    <link rel="Shortcut Icon" type="image/ico" href="imgs/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-startup-image" href="/img/ios/splash.png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
</script>
    <script type="text/javascript" src="/js/script.js">
</script>
    <script type='text/javascript'>
$(document).ready(function () {
     if ($("[rel=tooltip]").length) {
     $("[rel=tooltip]").tooltip();
     }
    });
    </script>
    <script src="/js/bootstrap.js" type="text/javascript">
</script><!-- Piwik -->

    <script type="text/javascript">
var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://localhost/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
    </script>
</head>

<body><div id="wrapper">

    <noscript>
    <p><img src="http://localhost/analytics/piwik.php?idsite=1" style="border:0;" alt=""></p></noscript><!-- End Piwik Code -->
    <?php include("includes/header.php"); ?>
    <div class="container">
        <div class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
            <h2><?php echo(htmlspecialchars($hw['title'])); ?></h2>
<br>
           <div class="hw-content"><?php echo(htmlspecialchars($hw['description'])); ?></div>
<br>
            <div class="row">
                <div class="col-sm-3 col-xs-6">
                    <?php echo(htmlspecialchars(strtoupper(pathinfo($hw['file'], PATHINFO_EXTENSION)))); ?> File
                </div>

                <div class="col-sm-3 col-xs-6">
                    <?php
echo(formatBytes($hw['size'], 2));
?>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <?php echo($hw['cost']); ?> Credit(s)
                </div>

                <div class="col-sm-3 col-xs-6">
                    By <?php echo(htmlspecialchars($hw['by'])); ?> <?php if ($hw['trusted']) { ?><a href="#" rel="tooltip" class="no-pointer" title="Trusted User"><i class="fa fa-bullseye"><?php ?></i></a><?php } ?>
                </div>
            </div>
            <hr>
            <?php if (!$user_id) { ?>

            <div class="row col-lg-12">
                To download this entire homework assignment for 1 credit, you will need an account. Both accounts and credits are <strong>free</strong> and more credits may be earned by sharing quality homework.
            </div><?php } ?>

            <div class="row">
                <div class="col-xs-6">
                    <?php if ($hasPurchased) { ?><a id="upvote" class="btn btn-sm btn-default<?php if ($hw['voteStatus'] == "upvoted") echo " btn-primary"; ?>"><i class="fa fa-thumbs-up"><?php ?></i></a>&nbsp;&nbsp;<?php } else { echo("Quality Rating:"); } ?><span id="rating"><?php echo($hw['rating']); ?></span><?php if ($hasPurchased) { ?>&nbsp;&nbsp;<a id="downvote" class="btn btn-sm btn-default<?php if ($hw['voteStatus'] == "downvoted") echo " btn-primary";?>"><i class="fa fa-thumbs-down"><?php ?></i></a><?php } ?>
                </div>

                <div class="col-xs-6 text-right">
                            <input type="hidden" id="postid" name="id" value="<?php echo($hw['id']); ?>"> <a class="btn btn-primary" style="width:140px; margin-bottom: 10px;" id="download">Download</a>
                        </form>
                    </form>
                </div>
            </div>

            <p class="text-center" style="margin-top:15px;">Comments feature coming soon.</p>
        </div>
    </div>
            <div id="push"></div>

    </div>
    <?php include("includes/footer.php"); ?>
</body>
</html>
