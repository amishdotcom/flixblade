<?php

if($dps['certification'] == 'n/A' OR $dps['certification'] == ''){unset($certification);}
else {
	$certification = $dps['certification'];
	$certification = str_replace(" | ","<br>",$certification);}

?>