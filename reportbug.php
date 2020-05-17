<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "Report a Bug - $site_name";
$desc="Use this Page to report a Bug in $site_name";
$keys="$site_name,Report,Bug,$site_name - Report a Bug,$site_name Report a Bug,Amish Dotcom,$site_name Masthead,Helpers,Members,Developers,About $site_name Developer,About $site_name's Developer,Developer of $site_name,About Developer of $site_name,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'system/reset_module/reset_module.php';
$page_type='reportbug';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">Report a Bug</p>
<div class="content">
<p><?php echo $site_name ?> is developed with Extreme Care and Patience and with thinking an extra foot for developing UI.</p>
<p>Although we accept that there may be bugs present on the website which could be discovered by you. In case you discover one please let us know at the address below</p>
<br>
<p class="py02">Use the format below to throw a Bug Report to <?php echo $site_name ?>
</p>
<br>
<p>Contact : <span class="py14">{INCLUDE YOUR CONTACT INFORMATION (Your Name is must)}</span></p>
<p>Work : <span class="py14">{WHAT YOU DO/WHO YOU ARE/QUALIFICATION/WHAT YOU DO ONLINE}</span></p>
<p>Bug Page : <span class="py14">{PAGE AT WHICH THE BUG RESIDES}</span></p>
<p>Bug Type : <span class="py14">{TYPE OF THE BUG}</span></p>
<p>Bug Description : <span class="py14">{DESCRIBE THE BUG}</span></p>
<p>Provisional Proof : <span class="py14">{PLEASE UPLOAD A PROOF OF THE BUG IF POSSIBLE (CAN BE A SCREENSHOT / FAULTY CODE / ETC...}</span></p>
<br><br>
<p class="py02">and send it to</p>
<br>
<p class="py16"><a href="mailto:founder@cybertronics.org.in?subject=Bug Report&body=Contact :%0dWork :%0dBug Page :%0dBug Type :%0dBug Description :%0dProvisional Proof :">founder@cybertronics.org.in</a></p>
</div>

<style>
@media only screen and (max-width: 340px){
	.py02{font-size:13px}
	.py14{font-size:14px}
	.py16{font-size:13px}
	.p{font-size:12px}
}
@media only screen and (max-width: 290px){
	.py02{font-size:12px}
	.py14{font-size:12px}
	.py16{font-size:12px}
	.p{font-size:11px}
}
</style>

<?php
include 'includes/central_footer.php'
?>

  </body>
</html>