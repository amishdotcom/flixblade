 <a class="navbar-brand" href="<?php echo $site_root ?>">
 <?php
if($page_type == 'title'){
include '../../switches/cdn.php';
echo"  <img src=\"$site_root/system/images/$site_name logo$reset_module\" width=\"30\" height=\"40\" alt=\"$site_name logo\" title=\"$site_name - $site_tagline\">";
}
elseif($page_type == 'serp'){
include 'switches/cdn.php';
echo"  <img src=\"$site_root/system/images/$site_name logo$reset_module\" width=\"30\" height=\"40\" alt=\"$site_name logo\" title=\"$site_name - $site_tagline\">";
}
else{
include 'switches/cdn.php';
echo"  <img src=\"$site_root/system/images/$site_name logo$reset_module\" width=\"30\" height=\"40\" alt=\"$site_name logo\" title=\"$site_name - $site_tagline\">";
}
?>
 </a>