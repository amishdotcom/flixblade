<?php

if($page_type == 'title'){
	if($dps['director_without_links'] == 'n/A' OR $dps['director_without_links'] == ''){unset($director_wl);}
	else {
		$director_wl = $dps['director_without_links'];
		$director_wl = str_replace(" / ",", ",$director_wl);}
}

elseif($page_type == 'search_meta_gen'){
	if($row[5] == 'n/A' OR $row[5] == ''){unset($director_wl);}
	else {
		$director_wl = $row[5];
		$director_wl = str_replace(" / ",", ",$director_wl);
	}
}

?>