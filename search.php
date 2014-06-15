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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
</script>
    <script src="/js/script.js" type="text/javascript">
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
                <div class="col-md-3">
                    <h3>Filter by type:</h3>
                </div>

                <div class="col-md-6">
                    <div class="cd-dropdown">
                        <span style="z-index: 1004;"><span class="filter">All types ( 5 )</span></span> <input type="hidden" name="cd-dropdown" value="all">

                        <ul style="height: auto;">
                            <li data-value="all" style="transition: all 300ms ease; -webkit-transition: all 300ms ease; width: 389px; z-index: 1003; top: 0px; left: 0px; margin-left: 0px; opacity: 1; -webkit-transform: none;"><span class="filter">All types ( 5 )</span></li>

                            <li data-value="book-chapter" style="transition: all 300ms ease; -webkit-transition: all 300ms ease; width: 389px; z-index: 1002; margin-left: 0px; opacity: 1; top: 3px; left: 0px; -webkit-transform: none;"><span class="filter">Book Chapter ( 2 )</span></li>

                            <li data-value="cpaper" style="transition: all 300ms ease; -webkit-transition: all 300ms ease; z-index: 1001; margin-left: 0px; opacity: 1; top: 6px; left: 2px; width: 385px; -webkit-transform: none;"><span class="filter">Conference paper ( 1 )</span></li>

                            <li data-value="jpaper" style="transition: all 300ms ease; -webkit-transition: all 300ms ease; z-index: 1000; margin-left: 0px; opacity: 1; top: 9px; left: 4px; width: 381px; -webkit-transform: none;"><span class="filter">Journal paper ( 2 )</span></li>
                        </ul>
                    </div>
                </div>
		</div></div>
            </div>
        <div class="container extendfull">
       

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
</body>
</html>
