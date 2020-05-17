<?php

if($page_type == 'title'){

if($dps['aka'] == 'n/A' OR $dps['aka'] == ''){unset($aka);}
else {
	$aka = $dps['aka'];
	$aka = str_replace(" | ","<br>",$aka);}

}

if($page_type == 'search_meta_gen'){

if($row[3] == 'n/A' OR $row[3] == ''){unset($aka);}
else {
	$aka = $row[3];
	$aka = str_replace(" | ",",",$aka);}

}

?>