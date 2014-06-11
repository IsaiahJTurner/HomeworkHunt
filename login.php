<?php
require_once("functions.php");
$whack = new Whack();
if ($whack->getProfileID()) {
	header("Location: /share");
	die("You are already logged in.");
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

    <title>Sign in to Homework Hunt</title>
    <link rel="Shortcut Icon" type="image/ico" href="imgs/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/icon114x114.png">
    <link rel="apple-touch-startup-image" href="/img/ios/splash.png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
</script>
    <script src="/js/bootstrap.js" type="text/javascript">
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
        <form method="post" action="/api/login">
            <div class="row">
                <div class="col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Login <a href="/register">Need an account?</a></label> <input type="text" class="form-control" name="login" id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label> <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="text-center">
					<input type="submit" value="Log in" class="btn btn-primary text-center" style="width:160px; margin-bottom: 10px;">
                    </div>
                </div>
            </div>

        </form>
    </div>
<hr>
    <?php include("includes/footer.php"); ?>
</body>
</html>
