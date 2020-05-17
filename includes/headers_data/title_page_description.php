<?php
//Done this in order to reuse in page title in og and any other page
if(isset($dps['director_without_links']) AND isset($description)){
	ob_start(); //Start output buffer
	echo "Directed by ".$dps['director_without_links']. ". $description";

	$desc = ob_get_contents(); //Grab output
	ob_end_clean(); //Discard output buffer
}
if(!isset($title_type) AND !isset($description)){
	if(isset($page_title)){$desc = $page_title;}
}
?>