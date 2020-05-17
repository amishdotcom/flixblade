<?php

//Websites Major Variables
$site_name = "flixblade";
$site_tagline = "The Media Database";
$site_root = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$current_page_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$cdn = "http://127.0.0.1/cdn/flixblade";
$cdn_loc = "../../../cdn/flixblade"; //To address the same both the $cdn and $cdn_loc, one for http and the other one for local files use from the perspective of trigger page.
$custom_site_root = "flixblade.localhost";

//Url Files Variables
$title_bridge = "$site_root/title/";

/* Path Variables */
$images = 'media/images';
$thumbs = 'media/thumbs';
$search_page_loc = "$site_root/search";

?>