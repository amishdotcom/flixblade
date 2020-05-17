<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "About - $site_name";
$desc="$site_name is an Internet Movie Database which is expected to have the collection of all Movies, TV Shows, TV Series etc. from round the globe. The Project is started with a mission to provide Internet users round the globe with correct and most Authentic Information related to Movies and TV Shows.";
$keys="$site_name,About,About $site_name,Movies,About Movies,All About Movies,Movie Database,Internet Movie Database,$site_name Movie";

include 'system/reset_module/reset_module.php';
$page_type='about';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">About <?php echo $site_name ?></p>
<div class="content">
<p><?php echo $site_name ?> is an Internet Movie Database which is expected to have the collection of Information for all Movies, TV Shows, TV Series etc. from round the globe. The Project is started with a mission to provide Internet users round the globe with correct and most Authentic Information related to Movies and TV Shows.</p>
<p>But as for now the database at <?php echo $site_name ?> only holds a bit of that information but is constantly expanding its database. You can check the current database properties <a href = "dbversion">here</a>.</p>
<p>The Project is being Developed by <a href="https://www.facebook.com/amishdotcom/" target="_blank">Amish Dotcom</a> who also owns Internet Group <a href="http://cybertronics.org.in">Cybertronics</a>. Cybertronics is determined to create web for the Next Generation.
<p><?php echo $site_name ?> provides its users an easy access to its Database through Search Engines, SERP's and its integrated Search Technology. <?php echo $site_name ?> provides information about any Movie, TV Show, etc. including facilities such as Release Dates, Directors, Writers and Starcast.</p>
<p><?php echo $site_name ?> also provides its users with a Form to let it know if any information is untrue on its platform, upon the successful submission of form the information is looked around and is Investigated until it is found to be correct.</p>
<p><?php echo $site_name ?> is currently in its very early stage and is currently looking for a positive support to help it let grow, if you want to help by any of the way then please visit the <a href="<?php echo "$site_root/contact" ?>">Contact</a> Page.</p>
</div>

<?php
include 'includes/central_footer.php'
?>

  </body>
</html>