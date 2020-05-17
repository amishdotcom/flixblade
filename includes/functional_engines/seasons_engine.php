<?php

if($dps['seasons_without_links'] == 'n/A' OR $dps['seasons_without_links'] == ''){unset($seasons_wl);}
else {
	$seasons_wl = $dps['seasons_without_links'];
	$seasons_wl = str_replace(" / ","<br>",$seasons_wl);}

?>