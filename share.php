<!DOCTYPE html>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
</script>
    <script src="/js/bootstrap.js" type="text/javascript">
</script>
</head>

<body>
<?php include("includes/header.php"); ?>
    <div class="container">
        <form method="post" action="submit.php">
            <div class="row">
                <div class="col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
                    <img src="img/logo.png" width="80%" style="margin-left:10%; margin-bottom:15px;" class="img-responsive">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username <a href="register.php">Need an account?</a></label> <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label> <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Select</label>

                        <div style="position:relative;">
                            <a class='btn btn-default' href='javascript:;'>Choose File... <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'></a> &nbsp; <span class='label label-info' id="upload-file-info"></span>
                        </div>

                        <p class="help-block">txt, rtf, and doc are preferred.</p>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <button type="submit" class="btn btn-success text-center" style="width:160px; margin-bottom: 10px;">Submit</button>

                <h4>Or Import From The Cloud</h4><a href="upload.php" class="btn btn-danger text-center" style="width:160px; margin-bottom: 10px;">Google Drive</a> <a href="upload.php" class="btn btn-primary text-center" style="width:160px; margin-bottom: 10px;">DropBox</a> <a href="upload.php" class="btn btn-primary text-center" style="width:160px; margin-bottom: 10px;">One Drive</a>
            </div>
        </form>
    </div>

    <?php include("includes/footer.php"); ?>
</body>
</html>
