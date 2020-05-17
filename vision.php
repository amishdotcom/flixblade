<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "Vision - $site_name";
$desc="Founded in 2020, $site_name's vision is to create a Humongous Database of Movie Releated Information and give people the access to it using the power of its world class search Technology.";
$keys="$site_name,Vision,Vision $site_name,Movie,About Movies,All About Movies,Movie Database,Internet Movie Database,$site_name Movie,Vision of $site_name,What $site_name is about";

include 'system/reset_module/reset_module.php';
$page_type='vision';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="flixblade_exclusive_logo"></h1>
<hr class="line1" />

<p class="head">Our Vision</p>
<div class="content">
<p><center>Founded in 2020, <?php echo $site_name ?>'s vision is to create a Humongous Database of Movie Releated Information and give people the access to it using the power of its world class search Technology.</center></p>
</div>
<br><br><br><br><br><br><br>

<?php
include 'includes/central_footer.php'
?>

  </body>
</html>