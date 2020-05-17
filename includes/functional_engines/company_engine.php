<?php

if($dps['company_without_links'] == 'n/A' OR $dps['company_without_links'] == ''){unset($company_wl);}
else {
	$company_wl = $dps['company_without_links'];
	$company_wl = str_replace(" | ","<br>",$company_wl);}

?>