<?php
if (substr_count($_SERVER['REQUEST_URI'], "/") != 2) die("Homework not found");
$hwID = end(explode('/', $_SERVER['REQUEST_URI']));
require_once("../functions.php");
$whack = new Whack();
$hw = $whack->homework($hwID);
?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="the hw hack, hw hack, answers, homework, essays, papers, projects, hw">
    <meta name="description" content="Find answers to any class assignment shared by users like you! Fuel the community, upload your answers today! It's free!">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <title>The HW Hack</title>
    <link rel="Shortcut Icon" type="image/ico" href="imgs/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-startup-image" href="/img/ios/splash.png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/styles.css?dsfadsf" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
</script>

    <script src="/js/bootstrap.js" type="text/javascript">
</script>
</head>

<body>
    <?php include("../includes/header.php"); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-push-1 col-sm-3">
                <h4 class="text-center">Homework Quality</h4>

                <div class="row text-center">
                    Using our advanced algorithm, we have determined this homework to be of <strong>Good</strong> quality. We recommend you please take caution and verify answers whenever possible even for high quality homework.
                </div>
                <div class="row text-center" style="font-size:20px">
                    <a href="#up" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a> 23  |  21
					<a href="#down" class="btn btn-danger"><i class="fa fa-thumbs-down"></i></a>
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

            <div class="col-lg-7 col-lg-push-1 col-sm-9">
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
                                	<div class="col-xs-4">
                                	File Extension: DOC
                                	</div>
                                	<div class="col-xs-4">
                                	File Size: 54MB
                                	</div>
                                	<div class="col-xs-4">
                                	Cost: 1 Credit
                                	</div>
                                </div>
                                <hr>

                                <div class="row col-lg-12">
                                    To download this entire homework assignment for 1 credit, you will need an account. Both accounts and credits are <strong>free</strong> and more credits may be earned by sharing quality homework.
                                </div>

                                <div class="row col-lg-12 text-right">
                                <form method="post" action="/api/download">
                                <input type="hidden" name="id" value="<?php echo($hw['id']); ?>">
                                    <input type="submit" class="btn btn-success" style="width:140px; margin-bottom: 10px;" value="Download">
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    Comments feature coming soon.
                </div>
            </div>
        </div>
    </div><?php include("../includes/footer.php"); ?>
</body>
</html>
