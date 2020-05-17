<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "DMCA - $site_name";
$desc="Use this page to send DMCA Notice to $site_name";
$keys="$site_name,DMCA,DMCA Page,DMCA $site_name,DMCA,Digital Millennium Copyright Act,DMCA Notice to $site_name,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'system/reset_module/reset_module.php';
$page_type='dmca';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">DMCA</p>
<div class="content">
<br>
<p class = "text-center">However we keep only that data that lies under public domain, but if you still think that we have some of your copyrighted data then,</p>
<p class="py08">You can use this page to send a DMCA Notice to <?php echo $site_name ?></p>
<br><br>
<p class="py02">Your notification must:</p>
<p>• Be in writing (this includes both hardcopy or digital)</p>
<p>• Be signed (whether in writing of via electronic signature) by the copyright owner or agent</p>
<p>• Identify the original copyrighted work (or works if there ar multiple) you claim has been infringed</p>
<p>• Identify the material that is infringing your copyrighted work</p>
<p>• Include contact information so that we can reach you, if necessary</p>
<p>• Include a statement your complaint is in “good faith”</p>
<p>• Include a statement the information in the notification is accurate, and</p>
<p>• Include a statement that under penalty of perjury you are authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.</p>
<br>
<p class="py12">&nbsp;&nbsp;&nbsp;&nbsp;(Tap here to see a SAMPLE <span class="py12"><a href="/nullvoid/DMCA_example" target="_blank">DMCA TAKEDOWN NOTICE TEMPLATE)</a></span></p>
<br><br>
<p class="py02">and send it to</p>
<br>
<p class="py16"><a href="mailto:founder@cybertronics.org.in?subject=DMCA Notice">founder@cybertronics.org.in</a></p>
</div>

<style>
@media only screen and (max-width: 340px){
	.py08{font-size:30px}
	ul.py02{font-size:14px}
	.py16{font-size:13px}
}
@media only screen and (max-width: 290px){
	.py08{font-size:25px}
	ul.py02{font-size:13px}
	p,.py16{font-size:11px}
}
</style>

<?php
include 'includes/central_footer.php'
?>

  </body>
</html>