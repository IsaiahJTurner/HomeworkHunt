<?php
$homepage = true;
?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Homework Hunt, hw hunt, answers, homework, essays, papers, projects, hw">
    <meta name="description" content="Find answers to any class assignment shared by users like you! Fuel the community, upload your answers today! It's free!">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <title>Homework Hunt</title>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/icon157x157.png">
    <link rel="Shortcut Icon" type="image/ico" href="imgs/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-startup-image" href="/img/ios/splash.png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
</script>
    <script src="/js/bootstrap.js" type="text/javascript">
</script>
    <script src="/js/script.js" type="text/javascript">
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
    </script><noscript>
    <p><img src="http://localhost/analytics/piwik.php?idsite=1" style="border:0;" alt=""></p></noscript><!-- End Piwik Code -->
</head>

<body class="landing">
	<div class="wrapper">
	<?php include("includes/header.php"); ?>
    <div class="main dark fullHeight">
        <div class="container text-center">
            <form method="get" action="/search">
                <div class="row">
                    <div class="col-md-6 col-md-push-3 col-xs-8 col-xs-push-2 text-center"><img src="img/logo-light.png" width="80%" style="margin-left:10%; margin-bottom:15px;" class="img-responsive"></div>

                    <div class="row text-center">
                        <input type="text" autofocus="" class="search" name="q" placeholder="Search homework..." autocomplete="off"> <input type="submit" class="submit" value="GO">
                    </div>
                </div>
            </form><br/>
            <div class="row">
            <a href="/share" class="btn-default btn btn-lg">Share Your Homework!</a>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <h2>Why do I need an invite to sign up?</h2>

        <p>(let's face it, getting an invite can be a pain)</p><br>

        <div class="row big-icons">
            <div class="col-md-4">
                <i class="fa fa-recycle"><?php ?></i>

                <h4>Prevent Plagiarism Detection</h4>

                <p>Plagiarism detectors work by scanning hundreds of sites and downloading all their content. On Homework Hunt, we don't have that problem. By only revealing snippets of information to unregistered users, plagiarism detectors are never able to find the content you share Homework Hunt.</p>
            </div>

            <div class="col-md-4">
                <i class="fa fa-smile-o"><?php ?></i>

                <h4>Maintain Quality Content</h4>

                <p>With any growing community, more members means less quality content. We want to ensure that only good homework gets exchanged on Homework Hunt and that means we don't want spam bots creating an account. Invites mean only real and trustable people join Homework Hunt.</p>
            </div>

            <div class="col-md-4">
                <i class="fa fa-ban"><?php ?></i>

                <h4>Stop Pesky Teachers</h4>

                <p>Remember way back in the day when Facebook was the only social network? Then your parents, grandparents, and other people you don't want knowing your secrets started joining and other sites like Instagram and Twitter had to be created. We don't want teachers joining Homework Hunt!</p>
            </div>
        </div>
    </div>

    <div class="dark">
        <div class="container  text-center">
            <h2>Share to download!</h2>

            <div class="row">
                <p class="col-xl-push-3 col-xl-6 col-lg-push-2 col-lg-8 col-md-push-1 col-md-10">Before you can earn the privilege of downloading, you must first share a few pieces of homework. Make sure it's correct, spam or incorrect homework can get you banned!</p>
            </div>

            <div class="row">
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Desired Username</label> <input type="text" class="form-control input-lg" id="exampleInputEmail2" placeholder="JohnDoe">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Your Email Address</label> <input type="email" class="form-control input-lg" id="exampleInputEmail2" placeholder="john@example.com">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Password</label> <input type="password" class="form-control input-lg" id="exampleInputPassword2" placeholder="********">
                    </div> <button type="submit" class="btn btn-default btn-lg">Join the Hunt</button>
                </form>
            </div>

            <div class="row text-center">
                <p>By clicking "Join the Hunt" you agree to our <a href="/legal">Terms and Conditions</a>.</p>
            </div>
        </div>
    </div>
	</div><?php include("includes/footer.php"); ?>
</body>
</html>
