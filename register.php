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
    <meta name="keywords" content="the hw hack, hw hack, answers, homework, essays, papers, projects, hw">
    <meta name="description" content="Find answers to any class assignment shared by users like you! Fuel the community, upload your answers today! It's free!">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <title>Sign Up for The HW Hack</title>
    <link rel="Shortcut Icon" type="image/ico" href="imgs/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/icon114x114.png">
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
    <form method="post" action="/api/register">
        <div class="row">
            <div class="col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
                <div class="form-group">
    <label for="username">Desired Username <a href="/login">Already have an account?</a></label>
    <input type="text" class="form-control" id="username" name="username" placeholder="JohnDoe">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="john.doe@example.com">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="********">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="terms"> By checking this box, you accept to our <a href="/terms">Terms & Conditions</a>.
    </label>
  </div>
            </div>
        </div>

        <div class="row text-center">
            <input type="submit" value="Create an Account" class="btn btn-success text-center" style="width:160px; margin-bottom: 10px;" id="submit">
        </div>
    </form>
    </div>

    <?php include("includes/footer.php"); ?>
</body>
</html>