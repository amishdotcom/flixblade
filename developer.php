<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "About Developer - $site_name";
$desc="About Founder of $site_name";
$keys="$site_name,About Developer,Amish Dotcom,About $site_name Developer,About $site_name's Developer,Developer of $site_name,About Developer of $site_name,The boy who Invented $site_name - Amish Dotcom,Owner of Cybertronics,Founder of Cybertronics,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'system/reset_module/reset_module.php';
$page_type='developer';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">About Developer</p>
<div class="content">
<p>The <a href="<?php echo $site_root ?>"><?php echo $site_name ?></a> is a musical project developed by <a href="https://www.facebook.com/amishdotcom" target="_blank"><b>Amish Dotcom</b></a></p>
<br>
<p class="amish_dotcom_image" alt="Amish Dotcom" title="Amish Dotcom"></p>
<br><br>
<p>I <a href="https://www.facebook.com/amishdotcom" target="_blank">Amish Dotcom</a> is the founder of Internet Web Group <a href="http://cybertronics.org.in" target="_blank">Cybertronics</a>. My Vision is to make the Information organized on the Internet for a better Tomorrow. I dream and make Internet web projects so that I can feel the breath inside me. I made <a href="<?php echo $site_root ?>"><?php echo $site_name ?></a> with a vision so that I can Organize the Cinematic Information over the Web more Accurately and Orderly. Someday however I think that I will succeed. If you want to support me then please write to <a href="mailto:founder@cybertronics.org.in?subject=I want to help in your Project" target="_blank">founder@cybertronics.org.in</a></p>
</div>

<?php
include 'includes/central_footer.php'
?>
	
  </body>
</html>