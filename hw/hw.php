<?php
if (substr_count($_SERVER['REQUEST_URI'], "/") != 2) die("Homework not found");
$hwID = end(explode('/', $_SERVER['REQUEST_URI']));
require_once("../functions.php");
$whack = new Whack();
$hw = $whack->homework($hwID);
$user_id = $whack->getProfileID();
if (!$hw) die("Homework not found");
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
?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Homework Hunt, hw hunt, answers, homework, essays, papers, projects, hw">
    <meta name="description" content="Find answers to any class assignment shared by users like you! Fuel the community, upload your answers today! It's free!">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <title>Homework Hunt</title>
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
	<script type="text/javascript" src="/js/script.js"></script>
	<script type='text/javascript'>
     $(document).ready(function () {
     if ($("[rel=tooltip]").length) {
     $("[rel=tooltip]").tooltip();
     }
   });
  </script>
	    <script src="/js/bootstrap.js" type="text/javascript"></script>
	    
    <!-- Piwik -->
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
<noscript><p><img src="http://localhost/analytics/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</script>
</head>

<body>
    <?php include("../includes/header.php"); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <h4 class="text-center">Homework Quality</h4>

                <div class="row text-center">
                    Using our advanced algorithm, we have determined this homework to be of <strong>Good</strong> quality. We recommend you please take caution and verify answers whenever possible even for high quality homework.
                </div>
                <div class="row text-center" style="font-size:20px">
                    <a id="upvote" class="btn btn-default"><i class="fa fa-thumbs-up"></i></a> <span id="rating"><?php echo($hw['rating']); ?></span> <a id="downvote" class="btn btn-default"><i class="fa fa-thumbs-down"></i></a>
                </div>
            </div>

            <div class="modal fade donate" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                            <h4 class="modal-title" id="mySmallModalLabel">Coming Soon</h4>
                        </div>

                        <div class="modal-body">
                            The import feature is not available yet, please check back soon.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-sm-9">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php echo($hw['title']); ?></h4>
                        </div>

                        <div class="panel-collapse collapse in">
                            <div class="panel-body">
                               <?php echo($hw['description']); ?>
                                <hr>
                                <div class="row">
                                	<div class="col-md-3 col-xs-6">
                                	.<?php echo(pathinfo($hw['file'], PATHINFO_EXTENSION)); ?> Extension
                                	</div>
                                	<div class="col-md-3 col-xs-6">
                                	<?php
                                	echo(formatBytes($hw['size'], 2));
                                	?>
                                	</div>
                                	<div class="col-md-3 col-xs-6">
                                	1 Credit
                                	</div>
                                	<div class="col-md-3 col-xs-6">
                                	By <?php echo($hw['by']); ?> <?php if ($hw['trusted']) { ?><a href="#" rel="tooltip" title="Trusted User"><i class="fa fa-bullseye"></i></a><?php } ?>
                                	</div>
                                </div>
                                <hr>
								<?php if (!$user_id) { ?>
                                <div class="row col-lg-12">
                                    To download this entire homework assignment for 1 credit, you will need an account. Both accounts and credits are <strong>free</strong> and more credits may be earned by sharing quality homework.
                                </div>
								<?php } ?>
                                <div class="row col-lg-12 text-right">
                                <?php if ($user_id) { ?>
                                <form method="post" action="/api/download" target="_blank">
                                <input type="hidden" id="postid" name="id" value="<?php echo($hw['id']); ?>">
                                <?php } else { ?>
                                <form method="post" action="/login" target="_blank">
                                <input type="hidden" id="postid" name="id" value="<?php echo($hw['id']); ?>">
                                <?php } ?>
                                    <input type="submit" class="btn btn-primary" style="width:140px; margin-bottom: 10px;" value="Download">
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center" style="margin-top:15px;">Comments feature coming soon.</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php include("../includes/footer.php"); ?>
</body>
</html>
