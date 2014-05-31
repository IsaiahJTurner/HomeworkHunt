<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title><?php echo htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="Shortcut Icon" type="image/ico" href="imgs/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/ios/icon114x114.png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/styles.css?dadsfsfadsf" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
</script>
    <script src="/js/bootstrap.js" type="text/javascript">
</script>
</head>

<body>
<header>
        <div class="header">
            <a href="/"><img src="img/logo.png"></a>
        </div>
    </header>
    <div class="container">
    <div class="status">Search results for: <?php echo htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8'); ?></div>
        <table id="results">
        <tbody>
            <?php
              $q = $_GET['q'];
              $mysql_con = mysqli_connect('localhost','whack','lbruxfrdseae','homework_db');
              $query = mysqli_query($mysql_con,"SELECT * FROM testable WHERE filename LIKE '%$q%' OR description LIKE '%$q%';");
              while($row = mysqli_fetch_array($query)) {
                echo "<tr><td><a href='/files/".$row['filename']."'>".$row['filename']."</a>";
                echo "<p>".$row['description']."</p></td></tr>";
              }
              mysqli_close($mysql_con);
            ?>
            </tbody>
        </table>
    </div>
    <footer>
        <hr>

        <p>Made with ♥ by <a href="http://isaiahjturner.com">Isaiah Turner</a> & <a href="http://lukejarboe.com/">Luke Jarboe</a> in Maryland.</p>
    </footer>
</body>
</html>
