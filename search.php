<!DOCTYPE html>

<html lang="en" style="width:670px;max-width:100%;display: block;margin-left: auto;margin-right: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>The HW Hack</title>

    <link rel="Shortcut Icon" type="image/ico" href="imgs/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/img/ios/icon114x114.png" />

    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</head>
<body>
<header style="background-color: #F8F8F8;height: 40px;left:0;position: fixed;width:100%;top:0;display: inline-block;text-align:center;box-shadow: 0px 1px 1px #d9d9d9;">
<div class="dropdown">
<a data-toggle="dropdown" href="#" style="text-decoration:none;color: #0099FF;font-size: 28px;"><span class="glyphicon glyphicon-search" style="font-size: 28px;"></span> Search</a>
<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="max-width:100%;">
  <li>
    <form method="post" action="search.php" style="text-align:center;">
      <input placeholder="Search worksheets, book answers, and more!" type="text" style="width:570px;max-width:95%;height:27px;line-height:27px;text-indent:5px;font-family:arial, sans-serif;font-size:13px;color:#333;background: #fff;border:solid 1px #d9d9d9;-moz-border-radius:0;-webkit-border-radius:0;" name="query"/><br/>
      <input type="submit" name="submit" style="background: url('/img/search.png') no-repeat #4d90fe center;margin-top: 15px; cursor:pointer; width:70px; height: 31px; line-height:0; font-size:0; text-indent:-999px; color: transparent; border: 1px solid #3079ED; -moz-border-radius: 2px; -webkit-border-radius: 2px;" value="Search"/>
      <input type="hidden" name="search" value="1">
    </form>
  </li>
</ul>
<a href="#upload" style="text-decoration:none;color: #0099FF;font-size: 28px;"><span class="glyphicon glyphicon-cloud-upload" style="font-size: 28px;"></span> Upload</a>
</div>
</header>
<br>
<br>
<br>
<table border='0' style='width:100%; font'>
<?php
if($_POST['query'] != ''){
  $poo = $_POST['query'];
  echo("Search results for: ".$poo."<br><br>");
  $sqlicon = mysqli_connect('localhost','whack','lbruxfrdseae','homework_db');
  $foo = mysqli_query($sqlicon,"SELECT * FROM testable WHERE filename LIKE '%$poo%' OR description LIKE '%$poo%';");
  while($woo = mysqli_fetch_array($foo)) {
    echo "<tr id='filename'><td><a href='/files/".$woo['filename']."'>".$woo['filename']."</a></td></tr>";
    echo "<tr id='description'><td>".$woo['description']."</td></tr>";
  }
  mysqli_close($sqlicon);
}
else{
  header("Location: http://thehwhack.nullvariance.com");
}
?>
<style>#filename{text-decoration: none; font-family: arial, sans-serif; font-size: 22px; color: #0099FF;}#description{font-family: arial, sans-serif; font-size: 16px;}</style>
</table>
</body>
</html>
