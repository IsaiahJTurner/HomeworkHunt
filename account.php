<?php
require_once("functions.php");
$whack = new Whack();
$user_id = $whack->getProfileID();
if (!$user_id) {
    header("Location: /register");
    die("You need to login to access your account.");
}
$profile = $whack->getProfile($user_id);
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

    <title>My Account</title>
    <link rel="Shortcut Icon" type="image/ico" href="imgs/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-startup-image" href="/img/ios/splash.png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js" type="text/javascript"></script>
</script>
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
</head>

<body>
    <?php include("includes/header.php"); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-center">Hello, <?php echo(htmlspecialchars($profile['username'])); ?></h4>
				<h5 class="text-center"><?php echo $whack->creditsRemaining($user_id); ?> Credits Remaining</h5>
                <div class="row text-center">
                <p>We hope you are enjoying Homework Hunt. If you are having any troubles, feel free to contact us using the buttons below.</p>
                 <div class="row">
                 <div class="col-xs-6 text-right">
                    <a href="#" data-toggle="modal" class="btn btn-primary text-center" style="width:95%; margin-bottom: 10px;" data-target=".donate">Live Chat</a><br></div><div class="col-xs-6 text-left">
                    <a href="#" data-toggle="modal" class="btn btn-primary text-center" style="width:95%; margin-bottom: 10px;" data-target=".donate">Email Us</a>
                 </div></div>
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

            <div class="col-md-9">
<div class="table-responsive">
<table class="table table-hover">
      <thead>
        <tr>
          <th>Rating</th>
          <th>Downloads</th>
          <th>Title</th>
        </tr>
      </thead>
      <tbody>
      <?php
      
       foreach ($profile['posts'] as $post) {
       echo("<tr onclick='location.href=\"/hw/".$post['id']."\"'><td>".$post['rating']."</td>");
       echo("<td>".strval(0)."</td>");
       echo("<td>".htmlspecialchars($post['title'])."</td></tr>");
	   }
      
      ?>
      </tbody>
    </table></div></div>
        </div>
    </div>
    <hr>
    <?php include("includes/footer.php"); ?>
</body>
</html>
