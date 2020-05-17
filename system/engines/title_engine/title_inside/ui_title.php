
<!-- flixblade Multicast Header ---->

<!-- The main flixblade ui Stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/ui_title<?php echo $reset_module ?>">
<!---->

<!-- Header Elements-->
<header>

<!-- flixblade Search Bar Stylesheet Loader-->
<link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/js/jquery/ui/1.10.1/themes/base/minified/jquery-ui.min<?php echo $reset_module ?>">
<script type="text/javascript" src="<?php echo $site_root ?>/system/js/jquery/jquery-1.9.1.min<?php echo $reset_module ?>"></script>
<script type="text/javascript" src="<?php echo $site_root ?>/system/js/jquery/ui/1.10.1/jquery-ui.min<?php echo $reset_module ?>"></script>
<script type="text/javascript" src="<?php echo $site_root ?>/system/engines/root_search/instant/instant_search_content_pages<?php echo $reset_module ?>"></script>
<!---->

<!-- The main Navigation Bar-->
<?php
include '../../includes/central_navig_bar.php';
?>

<!---->

<!-- flixblade Search Bar -->
<form method="get" action="<?php echo $search_page_loc ?>" onsubmit="return do_search()">
<input id="q" type="text" name="q" placeholder="Search flixblade" class="auto" minlength='3' maxlength='2048'>
</form>
<!---->

</header>
<!---->
