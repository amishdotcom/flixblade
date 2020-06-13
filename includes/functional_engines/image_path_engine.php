<?php
//To Grab Image Identifier into a general variable

ob_start(); //Start output buffer
foreach ($dp as $dps) {echo "".$dps['image']."";}

$image = ob_get_contents(); //Grab output
ob_end_clean(); //Discard output buffer

if($page_type == "rss_generator")
{
$id = "$row[0]";
$image = "$row[4]";
}

//For Path (Part)
if ($id >= 1 && $id <= 100000 && $image != 'image-not-available.jpg'){$img_media_path = "part1";}
elseif ($id >= 100001 && $id <= 200000 && $image != 'image-not-available.jpg'){$img_media_path = "part2";}
elseif ($image == 'image-not-available.jpg'){$img_media_path = "other";}


$img_title_path = "$cdn/$images/$img_media_path/$image$reset_module";
$img_title_thumb_path = "$cdn/$thumbs/$img_media_path/$image$reset_module";

//To Check if Target image really exists
$trgtimgdtc = @fopen($img_title_path, 'r');

//If Target Image doesn't exists then point to regular thumbnail image
if(!$trgtimgdtc){
	$image = "image-not-available.jpg";
	$img_media_path = "other";
    $img_title_path = "$cdn/$images/$img_media_path/$image$reset_module";
	$img_title_thumb_path = "$cdn/$thumbs/$img_media_path/$image$reset_module";
}else{}
?>