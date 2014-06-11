<?php
require_once("functions.php");
$whack = new Whack();
$searchPage = true;
?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title><?php echo htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="Shortcut Icon" type="image/ico" href="imgs/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon157x157.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/ios/icon157x157.png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/styles.css?dadsfsfadsf" rel="stylesheet" type="text/css">
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
    <div class="status">Search results for: <?php echo htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8'); ?></div>
        <table id="results">
        <tbody>
            <?php
            $results = $whack->search($_GET['q']);
            if (!$results) echo "<tr><td>No matching results found.</td></tr>";
            else {
            	foreach ($whack->search($_GET['q']) as $result) {
	            	echo "<tr><td><a href='/hw/".$result['id']."'>".htmlspecialchars($result['title'])."</a>";
	            	$maxDescriptionLength = 300;
	            	if (strlen($result['description']) > $maxDescriptionLength) $truncation = "..."; else $truncation = ""; 
					echo "<p>".htmlspecialchars(substr($result['description'],0,$maxDescriptionLength).$truncation)."</p></td></tr>";
            	}
            	}
            ?>
            </tbody>
        </table>
    </div>
    <hr>
    <?php include("includes/footer.php"); ?>
</body>
</html>
