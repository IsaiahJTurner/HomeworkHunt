<?php
require_once("functions.php");
$whack = new Whack();
$searchPage = true;
if (!isset($_GET['q'])) $_GET['q'] = "";
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Search</title>
    <link rel="Shortcut Icon" type="image/ico" href="imgs/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/ios/icon157x157.png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript">
</script>
    <script src="/js/script.js" type="text/javascript">
</script>
    <script src="/js/modernizr.custom.js" type="text/javascript">
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

        <div class="container-fluid light">
            <div class="container">
                <div class="row">
                    <div class="col-md-1 col-sm-2 col-xs-3">
                        <h3 style="padding: 10px initial;">Filter:</h3>
                    </div>
                    <div class="col-md-11 col-sm-10 col-xs-9">
                        <select id="cd-dropdown" class="cd-select">
                            <option value="-1" selected>
                                All
                            </option>

                            <option value="1">
                                Worksheet
                            </option>

                            <option value="2">
                                Essay
                            </option>

                            <option value="3">
                                Book Work
                            </option>

                            <option value="4">
                                Project
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="container extendfull" style="min-height:135px;">
            <div class="row">
                <div class="col-lg-9 col-md-11">
                    <div id="status" class="status">
                        Loading...
                    </div>

                    <table>
                        <tbody id="results"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="push"></div>
    </div><?php include("includes/footer.php"); ?>
    
        <script src="/js/jquery.dropdown.js" type="text/javascript">
</script>
<script type="text/javascript">
    		$( '#cd-dropdown' ).dropdown();

    </script>
</body>
</html>
