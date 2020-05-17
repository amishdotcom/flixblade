<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "Join Hands - $site_name";
$desc="Use this page to Join Hands and become an Official Member of $site_name Team";
$keys="$site_name,Join Hands,Join,Hands,$site_name - Join Hands,$site_name - Become a Member,Become,a,Member,Become a Partner,$site_name - Partner,$site_name Help Adding Content,$site_name - Help Adding Content,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'system/reset_module/reset_module.php';
$page_type='join_hands';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">Join Hands</p>
<div class="content">
<p>As we are building a very big project(namely <?php echo $site_name ?>), hence it requires a lot of efforts to put in for making a Next Generation Cinematic Info Search Platform.</p>
<p>Its nice if you are willing to help us by becoming a Helping Hand by joining our Team or either by becoming a partner.</p>
<p>For any such queries you can contact us on address below</p>
<br>
<p class="py16"><a href="mailto:founder@cybertronics.org.in?subject=I want to Join Hands">founder@cybertronics.org.in</a></p>
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