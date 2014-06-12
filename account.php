<?php
require_once("functions.php");
$whack = new Whack();
if (!$whack->getProfileID()) {
    header("Location: /register");
    die("You need to login to access your account.");
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

    <title>Homework Hunt</title>
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
            <div class="col-sm-3">
                <h4 class="text-center">Import From Cloud</h4>

                <div class="row text-center">
                    <a href="#" data-toggle="modal" class="btn btn-primary text-center" style="width:160px; margin-bottom: 10px;" data-target=".donate">Google Drive</a><br>
                    <a href="#" data-toggle="modal" class="btn btn-primary text-center" style="width:160px; margin-bottom: 10px;" data-target=".donate">Dropbox</a> <a data-toggle="modal" href="#" class="btn btn-primary text-center" style="width:160px; margin-bottom: 10px;" data-target=".donate">One Drive</a>
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

            <div class="col-sm-9">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Direct File Upload</h4>
                        </div>

                        <div id="form" class="panel-collapse collapse in">
                            <form method="post" action="/api/share" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="title">Assignment Title</label> <input type="text" class="form-control" id="title" placeholder="Vocabulary Workshop Answer Key All Units: Level D" name="title">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label> 
                                        <textarea type="text" class="form-control" id="description" placeholder="Most of these answers should be rite but I recommend checking them." name="description">
</textarea>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div style="position:relative;">
                                                    <a class='btn btn-default' href='javascript:;'>Select File... <input type="file" name="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
	                                                    
                                                    </a> &nbsp; <span class='label label-primary' id="upload-file-info"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-6 text-right">
                                                <input type="submit" class="btn btn-primary" style="width:160px; margin-bottom: 10px;" value="Share Answers">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php include("includes/footer.php"); ?>
</body>
</html>
