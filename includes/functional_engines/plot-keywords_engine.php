<?php


if($page_type == 'title'){

	if($dps['plot_keywords'] == 'n/A' OR $dps['plot_keywords'] == ''){unset($plot_key);}
		else {
			$plot_key = $dps['plot_keywords'];
			$plot_key = str_replace("  /  ",",",$plot_key);
			$plot_key = str_replace("-"," ",$plot_key);
			}

}

if($page_type == 'search_meta_gen'){

		if($row[6] == 'n/A'){unset($plot_key);}
		else {
			$plot_key = $row[6];
			$plot_key = str_replace("  /  ",",",$plot_key);
			$plot_key = str_replace("-"," ",$plot_key);
			}

}

?>