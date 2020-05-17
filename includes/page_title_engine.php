<?php
//For Page Title
													//Movie Page Title----------------------------
if($page_type == 'title')
{
	if (isset($dps['name']) AND isset($dps['year'])){
	//Title Fetcher
	ob_start(); //Start output buffer
	echo $dps['name']." (".$dps['year'].") - $site_name";

	$page_title = ob_get_contents(); //Grab output
	ob_end_clean(); //Discard output buffer
	}
}
													//serp Page Title----------------------------
													
elseif($page_type == 'serp')
{
	//Title Fetcher
	if(isset($_GET['q']))	{
	$keyword_0 = trim($_REQUEST['q']);
	$page_title = "$keyword_0 - flixblade Search";	} else {$page_title = "Error - flixblade Search";}
}
?>