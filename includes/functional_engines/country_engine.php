<?php

if($dps['country_without_links'] == 'n/A' OR $dps['country_without_links'] == ''){unset($country_wl);}
else {
	$country_wl = $dps['country_without_links'];
	$country_wl = str_replace(" / ","<br>",$country_wl);}

?>