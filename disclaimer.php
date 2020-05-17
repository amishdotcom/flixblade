<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "Disclaimer - $site_name";
$desc="Disclaimer Page for $site_name";
$keys="$site_name,Disclaimer,Disclaimer Page,Database Version,Database,Version,Site,$site_name Disclaimer Page,Data Collection Policy,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'system/reset_module/reset_module.php';
$page_type='disclaimer';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">Disclaimer</p>
<div class="content">
<p><center>All the information on this website is published in good faith and for general information purpose only. <?php echo $site_name ?> does not make any warranties about the completeness, reliability and accuracy of this information. Any action you take upon the information you find on this website (<?php echo $site_name ?>.com), is strictly at your own risk. We will not be liable for any losses and/or damages in connection with the use of our website.

From our website, you can visit other websites by following hyperlinks to such external sites. While we strive to provide only quality links to useful and ethical websites, we have no control over the content and nature of these sites. These links to other websites do not imply a recommendation for all the content found on these sites. Site owners and content may change without notice and may occur before we have the opportunity to remove a link which may have gone ‘bad'.

Please be also aware that when you leave our website, other sites may have different privacy policies and terms which are beyond our control. Please be sure to check the Privacy Policies of these sites as well as their "Terms of Service" before engaging in any business or uploading any information.</center></p>
<br><br>
<center><p class="py02">Intellectual property</p></center>
<p><center>All product names, logos, and brands are property of their respective owners. All company, product and service names used in this website are for identification purposes only. Use of these names, logos, and brands does not imply endorsement.</center></p>
<br><br>
<center><p class="py02">Consent</p></center>
<p><center>By using our website, you hereby consent to our disclaimer and agree to its terms.</center></p>
</div>
<br><br><br><br><br><br><br>

<?php
include 'includes/central_footer.php'
?>

  </body>
</html>