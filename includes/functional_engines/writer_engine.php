<?php

if($page_type == 'title'){
	if($dps['writer_without_links'] == 'n/A' OR $dps['writer_without_links'] == ''){unset($writer_wl);}
	else {
		$writer_wl = $dps['writer_without_links'];
		$writer_wl = str_replace(" / ",", ",$writer_wl);}
}

?>