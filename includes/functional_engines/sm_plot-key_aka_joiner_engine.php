<?php

if(!isset($plot_key) AND !isset($aka)){
					
					$meta_search_meta = "";

					}

elseif(!isset($plot_key) AND isset($aka)){
					
					$meta_search_meta = $aka;

					}

elseif(isset($plot_key) AND !isset($aka)){
					
					$meta_search_meta = $plot_key;

					}

elseif(isset($plot_key) AND isset($aka)){
					
					$meta_search_meta = "$plot_key, $aka";

					}
?>