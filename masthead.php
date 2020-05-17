<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "Masthead - $site_name";
$desc="$site_name Masthead";
$keys="$site_name,Masthead,Amish Dotcom,$site_name Masthead,Co-Founders,Helpers,Members,Developers,About $site_name Developer,About $site_name's Developer,Developer of $site_name,About Developer of $site_name,The boy who Invented $site_name - Amish Dotcom,Owner of Cybertronics,Founder of Cybertronics,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'system/reset_module/reset_module.php';
$page_type='masthead';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">Masthead</p>
<div class="content">
<p>This Website is Exclusively Thought / Founded / Designed / Processed / Developed / Hosted by : <a href="https://www.facebook.com/amishdotcom/" target="_blank">Amish Dotcom</a></p>
</div>
<br><br><br><br><br><br><br><br>

<style>
@media only screen and (max-width: 525px){
	p,.py11{font-size:12px}
}
@media only screen and (max-width: 290px){
	p,.py11{font-size:11px}
}
</style>

<?php
include 'includes/central_footer.php'
?>

  </body>
</html>