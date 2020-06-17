<?php
//Done this in order to reuse in page title in og and any other page
if(isset($dps['director_without_links']) AND isset($description)){
	ob_start(); //Start output buffer
	echo "Directed by ".$dps['director_without_links']. ". $description";

	$desc = ob_get_contents(); //Grab output
	ob_end_clean(); //Discard output buffer
}else
{
	ob_start(); //Start output buffer
	
	if(isset($dps['year']) AND $dps['year'] != "n/A"){echo "Released in "; echo $dps['year'];}
	if(isset($dps['year']) AND isset($director_wl) AND $dps['year'] != "n/A" AND $director_wl != "n/A"){echo ", ";}
	if(isset($director_wl) AND $director_wl != "n/A"){echo "Directed by $director_wl";}
	if(isset($director_wl) AND isset($dps['cast_3_only_without_links']) AND $director_wl != "n/A" AND $dps['cast_3_only_without_links'] != "n/A"){echo ", ";}
	if(isset($dps['cast_3_only_without_links']) AND $dps['cast_3_only_without_links'] != "n/A"){echo "Starring "; echo $dps['cast_3_only_without_links'];}
	
	$desc = ob_get_contents(); //Grab output
	ob_end_clean(); //Discard output buffer
	
}
if(!isset($title_type) AND !isset($description)){
	if(isset($page_title)){$desc = $page_title;}
}
?>
