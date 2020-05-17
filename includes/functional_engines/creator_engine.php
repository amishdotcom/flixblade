<?php

if($dps['creator_without_links'] == 'n/A' OR $dps['creator_without_links'] == ''){unset($creator_wl);}
else {
	$creator_wl = $dps['creator_without_links'];
	$creator_wl = str_replace(" / ","<br>",$creator_wl);}

?>