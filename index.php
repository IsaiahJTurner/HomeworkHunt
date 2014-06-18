<?php
$homepage = true;
?>
<!DOCTYPE html>

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
                <div class="row">
                    <div class="col-md-6 col-md-push-3 col-xs-8 col-xs-push-2 text-center"><img src="img/logo-light.png" width="80%" style="display:inline;margin-left:10%; margin-bottom:15px;" class="img-responsive"><span style="position: absolute;
right: -20px;
font-size: 22px;">beta</span></div>

                    <div class="row text-center">
                        <form method="get" action="/search">
                            <input type="text" autofocus="" class="search" name="q" placeholder="Search homework..." autocomplete="off"> <input type="submit" class="submit" value="GO">
                        </form>
                    </div>
                </div><br>

                <div class="row">
                    <a href="/share" class="btn-default btn btn-lg">Share Your Homework!</a>
                </div>
            </div><!-- <i class="fa fa-arrow-circle-o-down" style="position: absolute;
bottom: -1;
width: 100%;
text-align: center;
font-size: 35px;"><?php ?></i>-->
        </div>

        <div class="container text-center">
            <h2>Why do I need an account to download?</h2>

            <p>(let's face it, creating an account sucks)</p><br>

            <div class="row big-icons">
                <div class="col-md-4">
                    <i class="fa fa-recycle"><?php ?></i>

                    <h4>Prevent Plagiarism Detection</h4>

                    <p>Plagiarism detectors work by scanning hundreds of sites and downloading all of their content. On Homework Hunt, we don't have that problem. By only revealing snippets of information to users who have not yet logged in, plagiarism detectors are unable to find the content you share Homework Hunt.</p>
                </div>

                <div class="col-md-4">
                    <i class="fa fa-smile-o"><?php ?></i>

                    <h4>Maintain Quality Content</h4>

                    <p>In order to keep the site up to date with the latest homework, we <strong>need you</strong> to share homework! Accounts help us to encourage everyone to not only download, but share homework as well. Don't worry, we've made uploading and earning credits super simple and completely free!</p>
                </div>

                <div class="col-md-4">
                    <i class="fa fa-ban"><?php ?></i>

                    <h4>Stop Pesky Teachers</h4>

                    <p>We definitely don't want teachers on Homework Hunt! Since only users who have logged in and earned credits are able to download, you teacher would have to upload their answer key and earn credits in order to snoop on you! And even if that did happen, would you really be complaining? ;)</p>
                </div>
            </div>
        </div>

        <div class="dark">
            <div class="container  text-center">
                <h2>Share to download!</h2>

                <div class="row">
                    <p class="col-xl-push-3 col-xl-6 col-lg-push-2 col-lg-8 col-md-push-1 col-md-10">We'll let you download one homework assignment for free. After that, you'll have to share homework to earn credits. Make sure it's correct because spam or incorrect homework can get you banned.</p>
                </div>

                <div class="row">
                    <form class="form-inline" role="form" action="/api/register" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" name="username" placeholder="Username (Be Creative)">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control input-lg" name="email" placeholder="Your Email Address">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control input-lg" name="password" placeholder="Password">
                        </div>&nbsp;<button type="submit" class="btn btn-default btn-lg">Join the Hunt</button>
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
