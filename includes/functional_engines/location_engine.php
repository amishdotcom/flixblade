<?php

if($dps['location_without_links'] == 'n/A' OR $dps['location_without_links'] == ''){unset($location_wl);}
else {
	$location_wl = $dps['location_without_links'];
	$location_wl = str_replace(", ","<br>",$location_wl);}

?>