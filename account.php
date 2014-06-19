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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
</script>
    <script src="/js/bootstrap.js" type="text/javascript">
</script><!-- Piwik -->

    <script type="text/javascript">
var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://homeworkhunt.com/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
    </script><noscript>
    <p><img src="http://homeworkhunt.com/analytics/piwik.php?idsite=1" style="border:0;" alt=""></p></noscript><!-- End Piwik Code -->
</head>

<body>
    <div id="wrapper">
        <?php include("includes/header.php"); ?>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-center">Hello, <?php echo(htmlspecialchars($profile['username'])); ?></h4>

                    <h5 class="text-center"><?php echo $whack->creditsRemaining($user_id); ?> Credits Remaining</h5>

                    <div class="row text-center">
                        <p>We hope you are enjoying Homework Hunt. If you are having any troubles, feel free to contact us using the buttons below.</p>

                        <div class="row contact">
                            <div class="col-xs-6 text-left">
                                <a href="http://chill.homeworkhunt.com" target="_blank" class="btn btn-primary text-center" style="width:95%; margin-bottom: 10px;">Chill Zone</a><br>
                            </div>

                            <div class="col-xs-6 text-right">
                                <a href="mailto:cacount@homeworkhunt.com" class="btn btn-primary text-center" style="width:95%; margin-bottom: 10px;">Email Us</a>
                            </div>
                        </div>Not <?php echo(htmlspecialchars($profile['username'])); ?>? <a href="/api/logout">Logout</a>.
                    </div>
                </div><?php if(count($profile['posts']) == 0) {
                    ?>

                <div class="col-lg-7 col-lg-push-1 col-md-9">
                    <div class="text-center">
                        <h3>Woah there! You haven't shared any homework yet!</h3>

                        <h4>Why is sharing homework important?</h4>

                        <ol class="text-left">
                            <li>Earn upvotes which translate directly into credits allowing you to download more homework!</li>

                            <li>Fuel the community! Remember, sharing is caring!</li>

                            <li>Become a Trusted member so you can download unlimited homework for free! <a href="/faq#trusted">Learn more</a>
                            </li>
                        </ol><a href="/share" class="btn btn-lg btn-primary">Share Homework</a>
                    </div><?php
                    } else { ?>

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
                                        echo("<td>".$post['downloads']."</td>");
                                        echo("<td>".htmlspecialchars($post['title'])."</td></tr>");
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div><?php } ?>
                    </div>
                </div>
            </div>

            <div id="push"></div>
        </div><?php include("includes/footer.php"); ?>
    </div>
</body>
</html>
