
<!--footer starts from here-->
<br><br>
<footer class="footer">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2"><?php echo $site_name; ?></h5>
<!--headin5_amrc-->
<p class="mb10"><?php echo $site_name ?> is an Internet Movie Database which is expected to have the collection of Information for all Movies, TV Shows, TV Series etc. from round the globe. The Project is started by <a style="color:white" href="https://www.facebook.com/amishdotcom/" target="_blank">Amish Dotcom</a> with a mission to provide Internet users round the globe with correct and most Authentic Information related to Movies and TV Shows.</p>
<p><i class="fa fa-location-arrow"></i> Knowledge Park III, Greater Noida, Uttar Pradesh 201306, India </p>
<p><i class="fa fa-phone"></i>  +91-7055627401  </p>
<p><i class="fa fa fa-envelope"></i> founder@cybertronics.org.in  </p>
</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Navigation</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<?php if ($page_type == 'dmca'){echo "<li><a href=\"#\">DMCA</a></li>\n";} else {echo "<li><a href=\"$site_root/dmca\">DMCA</a></li>\n";} ?>
<?php if ($page_type == 'masthead'){echo "<li><a href=\"#\">Masthead</a></li>\n";} else {echo "<li><a href=\"$site_root/masthead\">Masthead</a></li>\n";} ?>
<?php if ($page_type == 'developer'){echo "<li><a href=\"#\">About Developer</a></li>\n";} else {echo "<li><a href=\"$site_root/developer\">About Developer</a></li>\n";} ?>
<?php if ($page_type == 'cora'){echo "<li><a href=\"#\">Correction Appeal</a></li>\n";} else {echo "<li><a href=\"$site_root/correction_appeal\">Correction Appeal</a></li>\n";} ?>
<?php if ($page_type == 'reportbug'){echo "<li><a href=\"#\">Report a Bug</a></li>\n";} else {echo "<li><a href=\"$site_root/reportbug\">Report a Bug</a></li>\n";} ?>
<?php if ($page_type == 'hac'){echo "<li><a href=\"#\">Help Adding Content</a></li>\n";} else {echo "<li><a href=\"$site_root/hac\">Help Adding Content</a></li>\n";} ?>
<?php if ($page_type == 'rbl'){echo "<li><a href=\"#\">Report Broken Link</a></li>\n";} else {echo "<li><a href=\"$site_root/rbl\">Report Broken Link</a></li>\n";} ?>
<?php if ($page_type == 'join_hands'){echo "<li><a href=\"#\">Join Hands</a></li>\n";} else {echo "<li><a href=\"$site_root/join_hands\">Join Hands</a></li>\n";} ?>
<?php if ($page_type == 'donate'){echo "<li><a href=\"#\">Donate</a></li>\n";} else {echo "<li><a href=\"$site_root/donate\">Donate</a></li>\n";} ?>
<?php if ($page_type == 'disclaimer'){echo "<li><a href=\"#\">Disclaimer</a></li>\n";} else {echo "<li><a href=\"$site_root/disclaimer\">Disclaimer</a></li>\n";} ?>
</ul>
<!--footer_ul_amrc ends here-->
</div>


</div>
</div>


<div class="container">
<ul class="foote_bottom_ul_amrc">
<?php if ($page_type == 'root_index'){echo "<li><a href=\"#\">Home</a></li>\n";} else {echo "<li><a href=\"$site_root\">Home</a></li>\n";} ?>
<?php if ($page_type == 'about'){echo "<li><a href=\"#\">About</a></li>\n";} else {echo "<li><a href=\"$site_root/about\">About</a></li>\n";} ?>
<?php if ($page_type == 'policy'){echo "<li><a href=\"#\">Privacy Policy</a></li>\n";} else {echo "<li><a href=\"$site_root/policy\">Privacy Policy</a></li>\n";} ?>
<?php if ($page_type == 'terms'){echo "<li><a href=\"#\">Terms</a></li>\n";} else {echo "<li><a href=\"$site_root/terms\">Terms</a></li>\n";} ?>
<?php if ($page_type == 'contact'){echo "<li><a href=\"#\">Contact</a></li>\n";} else {echo "<li><a href=\"$site_root/contact\">Contact</a></li>\n";} ?>
</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright @ 2020 <a href="http://cybertronics.org.in">Cybertronics</a> | Designed & Developed by <a href="https://www.facebook.com/amishdotcom/">Amish Dotcom</a></p>
<p class="text-center"><?php if ($page_type == 'siteversion'){echo "<a href=\"#\">Website Version : $siteversion</a>";} else {echo "<a href=\"$site_root/siteversion\">Website Version : $siteversion</a>";} ?> / <?php if ($page_type == 'dbversion'){echo "<a href=\"#\">Database Version : $dbversion</a>";} else {echo "<a href=\"$site_root/dbversion\">Database Version : $dbversion</a>";} ?></p>

<!--<ul class="social_footer_ul">
<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="#"><i class="fab fa-twitter"></i></a></li>
</ul>-->
<!--social_footer_ul ends here-->
</div>

<!-- JSON-LD for schema.org -->
<script type="application/ld+json">
{ "@context" : "http://schema.org",
  "@type" : "Organization",
  "url" : "https://www.cybertronics.org.in",
  "founder" : "Amish Dotcom",
  "email": "founder@cybertronics.org.in",
  "contactPoint" : [
    { "@type" : "ContactPoint",
      "telephone" : "+91-7055627401",
      "contactType" : "customer service"
    } ] }
</script>

</footer>