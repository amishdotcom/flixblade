<?php

if($dps['cast_with_links'] == 'n/A' OR $dps['cast_with_links'] == ''){unset($full_cast);}
else {
	$full_cast = $dps['cast_with_links'];
	$full_cast = str_replace(" / ","<br>",$full_cast);
	$full_cast = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $full_cast);}

?>