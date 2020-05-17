
<!-- Facebook -->
<meta property="og:title" content="<?php if(isset($page_title)){echo $page_title;} ?>" />
<meta property="og:description" content="<?php if(isset($desc)){echo $desc;} ?>" />
<meta property="og:type" content="<?php if(isset($title_type)){echo $title_type;} ?>" />
<meta property="og:image" content="<?php if(isset($image)){echo $img_title_path;} ?>" />
<?php
include '../../includes/getimagesize.php';
?>
<meta property="og:image:height" content="<?php echo $height; ?>" />
<meta property="og:image:width" content="<?php echo $width; ?>" />
<meta property="og:url" content="<?php echo $current_page_url ?>" />
<meta property="og:site_name" content="<?php echo $site_name ?>" />
<meta property="fb:app_id" content="<?php echo $fb_app_id ?>" />

<!-- Twitter -->
<meta property="twitter:title" content="<?php if(isset($page_title)){echo $page_title;} ?>" />
<meta property="twitter:description" content="<?php if(isset($desc)){echo $desc;} ?>" />
<meta property="twitter:url" content="<?php echo $current_page_url ?>" />
<meta property="twitter:site" content="<?php echo $tweet_handle ?>" />
<meta property="twitter:card" content="summary" />
<meta property="twitter:image" content="<?php if(isset($img_title_path)){echo $img_title_path;} ?>" />
