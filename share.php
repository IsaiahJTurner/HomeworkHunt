<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="the hw hack, hw hack, answers, homework, essays, papers, projects, hw">
    <meta name="description" content="Find answers to any class assignment shared by users like you! Fuel the community, upload your answers today! It's free!">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <title>Share  |  The HW Hack</title>

    <link rel="Shortcut Icon" type="image/ico" href="imgs/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/ios/icon57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/img/ios/icon72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/icon114x114.png" />
    <link rel="apple-touch-startup-image" href="/img/ios/splash.png" />

    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</head>
<body>
    <header>
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
<div>
	<br/>
	<br/>
	<br/>
	<img src="img/logo.png" style="width:670px;max-width:80%;display: block;margin-left: auto;margin-right: auto;"></img>
	<div style="margin:20px auto auto auto;">
		<form method="post" action="search.php" style="text-align:center;">
			<input placeholder="Search worksheets, book answers, and more!" type="text" style="width:570px;max-width:95%;height:27px;line-height:27px;text-indent:5px;font-family:arial, sans-serif;font-size:13px;color:#333;background: #fff;border:solid 1px #d9d9d9;-moz-border-radius:0;-webkit-border-radius:0;" name="query"/><br/>
			<input type="submit" name="submit" style="background: url('/img/search.png') no-repeat #4d90fe center;margin-top: 15px; cursor:pointer; width:70px; height: 31px; line-height:0; font-size:0; text-indent:-999px; color: transparent; border: 1px solid #3079ED; -moz-border-radius: 2px; -webkit-border-radius: 2px;" value="Search"/>
			<input type="hidden" name="search" value="1">
			<a name="upload"></a>
		</form>
    <br>
		<form style="text-align:center;" action="" method="post" enctype="multipart/form-data">
		<h3 style="font-family: sans-serif;">Upload</h3>
			<textarea name="description" style="max-width:95%;border:solid 1px #d9d9d9;-moz-border-radius:0;-webkit-border-radius:0;" rows="10" cols="90" placeholder="Copy and paste or type as much about the document as possible to make it easier for people to find it. This part will not be visible to people who are looking for your assignment it is only used to make it easier for our search feature to look for it. Your file will be searchable immediately after it is uploaded."></textarea></br>
				<label for="file">Filename:</label>
				<input style="display: block;margin-left: auto;margin-right: auto;" type="file" name="file">
			<label for="submit">Upload:</label>
			<input type="submit" name="submit" style="background: url('/img/upload.png') no-repeat #4d90fe center;margin-top: 15px; cursor:pointer; width:70px; height: 31px; line-height:0; font-size:0; text-indent:-999px; color: transparent; border: 1px solid #3079ED; -moz-border-radius: 2px; -webkit-border-radius: 2px;" value="Upload">
		</form>
<?php
if($_FILES['file']['error'] > 0 && $_FILES['file']['error'] != 4){
	mail("lukejarboe@nullvariance.com", "Error in Upload", "Error: ".$_FILES['file']['error']);
	echo("You broke Something");
}
elseif($_FILES['file']['name'] != ''){
  echo "Type: ".$_FILES['file']['type']."<br>";
  echo "Size: ".round($_FILES['file']['size']/1024)." kB<br>";
  $predescription = $_POST['description'];
  $vpfn = $_FILES['file']['name'];
  $prefilename = str_replace(" ", "_", $vpfn);
  	if(file_exists('files/'.$prefilename) && $prefilename != ''){
  		echo ("Please rename the file and try again");
  	}
	else{
  		move_uploaded_file($_FILES['file']['tmp_name'],"files/".$prefilename);
  		$mysqlic = mysqli_connect("localhost","whack","lbruxfrdseae","homework_db");
  			if(!$mysqlic){
  				mail("lukejarboe@nullvariance.com", "mysql connection error", "Error: ".mysqli_connect_error());
  			}
  			else{
  				$filename = mysqli_real_escape_string($mysqlic,$prefilename);
  				$description = mysqli_real_escape_string($mysqlic,$predescription);
  				mysqli_select_db($mysqlic,"homework_db");
  				mysqli_query($mysqlic,"INSERT INTO testable (filename,description) VALUES ('$filename','$description');");
 				mysqli_close($mysqlic);
  			}
	}
}
else{
	echo("");
}
?>
		<h3 style="font-family: sans-serif; max-width: 90%; text-align:center; display: block; margin-left: auto; margin-right: auto;">Welcome to The HW Hack!</h3>
		<p class="text-justify" style="width:600px;max-width:95%;display: block;margin-left: auto;margin-right: auto;">I'll fill you in about what we are... This is the story of two high schoolers... A few months ago, procrastination led to many unstarted papers being due the next day. Like any other high schooler would do, I googled shit for hours and hours and finally found absolutely nothing to do my homework for me. I decided no one else would ever have to go through this ever again. At that moment, an idea was born. That idea then matured and grew into what would be soon called The HW Hack. Months of hard work bore what we are today. We set out to create a completely free of charge homework sharing site available to all countries, states, provinces, dictatorships, colleges, high schools, middle schools, and ages.</p>
	</div>
	<hr>
	<p style="text-size:11px;color:grey;">Icons used in the nav bar are by <em><a href="http://glyphicons.com" style="text-decoration:none;">http://glyphicons.com</a></em></p>
</body>
</html>