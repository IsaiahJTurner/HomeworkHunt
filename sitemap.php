<?php
	// This can be a VERY resource intensive script, feel free to fix it because I don't know how to do it better.
	require_once("functions.php");
	$whack = new Whack();
	// File names are used to generated modification times. Use relative locations.
	$landingPages = array(
		"/" => "./index.php",
		"/press" => "./press.php",
		"/share" => "./share.php",
		"/legal" => "./legal.php",
		"/login" => "./login.php",
		"/register" => "./register.php"
	);
	$numSiteMaps = $whack->sitemapePages();
	header("Content-Type:text/plain");
	// Echo the first XML line because PHP doesn't like that it starts with <?
	echo('<?xml version="1.0" encoding="UTF-8"?>');
?>

<?php 
// If this isn't a sitemap page, return the index.
if (!isset($_GET['p'])) { 
?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

   <sitemap>

      <loc><?php 
	      echo(SERVER_PROTOCOL."://".SERVER_HOSTNAME."/sitemap?p=0");
      ?></loc>

      <lastmod><?php /* Because this sitemap is this file, the date is always the same as this file. */echo date('c', filemtime(__FILE__)); ?></lastmod>

   </sitemap>
   <?php
   	for ($i = 1; $i <= $numSiteMaps; $i++) {
   	echo("<sitemap>");
    echo("<loc>");
    echo(SERVER_PROTOCOL."://".SERVER_HOSTNAME."/sitemap?p=".$i);
    echo("</loc>");
    echo("<lastmod>");
    // The next line sucks, it tells Google that our sitemap was just update no matter what. This shouldn't be the case. It should run sitemapPage() for each page and pull the newest date that is returned but I am trying to limit how resource intensive this script is.
    echo(date('c', time())); 
    echo("</lastmod>");
    echo("</sitemap>");
}
?>
</sitemapindex><?php 
// If this is the first page of the sitemap, send all the landing pages.
} else if (intval($_GET['p']) == 0) { ?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.90">

	<?php
	$priority = 1; 
	foreach($landingPages as $page => $location) {
	if ($priority != 0) $priority = $priority-0.1;
  echo("<url>");
   echo("<loc>".SERVER_PROTOCOL."://".SERVER_HOSTNAME.$page."</loc>");
    echo("<lastmod>".date('c', filemtime($location))."</lastmod>");
    echo("<priority>".$priority."</priority>");
  echo("</url>");
  } ?>
</urlset>
<?php } else if (intval($_GET['p']) >= $numSiteMaps){ ?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.90">
<?php
$posts = $whack->sitemapPage(intval($_GET['p']));
foreach ($posts as $post => $modified) {
	echo("<sitemap>");
    echo("<loc>");
    echo(SERVER_PROTOCOL."://".SERVER_HOSTNAME."/hw/".$post);
    echo("</loc>");
    echo("<lastmod>");
    echo(date('c', $modified)); 
    echo("</lastmod>");
    echo("</sitemap>");
	echo("Post");
}
?>
</urlset>
<?php } ?>