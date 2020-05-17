<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "Report Broken Link - $site_name";
$desc="Use this page to Report Broken Link to $site_name";
$keys="$site_name,Report Broken Link,Report,Broken,Link,Report Broken Link $site_name,Data Collection Policy,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'system/reset_module/reset_module.php';
$page_type='rbl';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">Report Broken Link</p>
<div class="content">
<p>If you see any External or Internal Link(Hyperlink) Broken on <?php echo $site_name ?> then please report on address below</p>
<br>
<p class="py16"><a href="mailto:founder@cybertronics.org.in?subject=Reporting Broken Link">founder@cybertronics.org.in</a></p>
</div>
<br><br><br><br>

<style>
@media only screen and (max-width: 340px){
	.py16{font-size:13px}
	.p{font-size:12px}
}
@media only screen and (max-width: 290px){
	.py16{font-size:12px}
	.p{font-size:11px}
}
</style>

<?php
include 'includes/central_footer.php'
?>

  </body>
</html>