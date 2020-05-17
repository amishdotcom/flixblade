<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "Database Version - $site_name";
$desc="A Complete Changelog of all Version Updates of $site_name Database";
$keys="$site_name,DB Version,Database Version,Database,Version,Site,$site_name Database Version,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'system/reset_module/reset_module.php';
$page_type='dbversion';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>
<style>.head{color:#d20505;margin-left:0%;font-size:25px}</style>
<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>
<hr class="line1" />

<p class="head"><script>
if ( $(window).width() > 560) {
  document.write('&emsp;&emsp;&emsp;&emsp;');
}
else{
	document.write('&nbsp;&nbsp;');
}
</script>Database Version (Changelog)</p>
<br>
<div class="content">
<p style="color:#00668C"><b>1</b><p>
<p>(Released: 24-Apr-2020)</p>
<ul><li><p>2 lakh(0.2 Million) Searchable Titles Released</p></li></ul>
</div>

<?php
include 'includes/central_footer.php'
?>

  </body>
</html>