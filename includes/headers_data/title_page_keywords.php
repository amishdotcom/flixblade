<?php
//Done this in order to reuse in page title in og and any other page
if(isset($title_type)){
	if(isset($dps['name']) AND $dps['name'] != "n/A"){$nam90 = "".$dps['name'].", ";}else{$nam90 = "";}
	if(isset($dps['year']) AND $dps['year'] != "n/A"){$yer90 = "".$dps['year'].", ";}else{$yer90 = "";}
	if(isset($director_wl) AND $director_wl != "n/A"){$dir90 = "".$director_wl.", ";}else{$dir90 = "";}
	if(isset($dps['cast_3_only_without_links']) AND $dps['cast_3_only_without_links'] != "n/A"){$cst90 = "".$dps['cast_3_only_without_links'].", ";}else{$cst90 = "";}
	if(isset($dps['genre_without_links']) AND $dps['genre_without_links'] != "n/A"){$gen90 = "".$dps['genre_without_links'].", ";}else{$gen90 = "";}

	ob_start(); //Start output buffer
	echo "$nam90$yer90$dir90$cst90$gen90$title_type, Credits, Information, User Ratings, Synopsis, Photos, Reviews";

	$keys = ob_get_contents(); //Grab output
	ob_end_clean(); //Discard output buffer
}
if(!isset($title_type)){
	$keys = "Credits, Information, User Ratings, Synopsis, Photos, Reviews";
}
?>
