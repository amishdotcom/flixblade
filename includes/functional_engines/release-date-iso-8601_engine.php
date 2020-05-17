<?php

	if($dps['release_date'] == 'n/A' OR $dps['release_date'] == ''){unset($release_date_iso_8601);}
		else {
			$release_date_iso_8601 = $dps['release_date'];
			$release_date_iso_8601 = str_replace(" (","(",$release_date_iso_8601);
			$release_date_iso_8601 = preg_replace("/\([^)]+\)/","",$release_date_iso_8601);
			$release_date_iso_8601 = str_replace(" ","-",$release_date_iso_8601);
			$release_date_iso_8601 = date('Y-m-d', strtotime($release_date_iso_8601));			
			}

?>