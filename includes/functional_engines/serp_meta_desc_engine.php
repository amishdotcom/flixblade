<?php

//Meta Description Compiler [Edit it for changes here]
$meta_type_raw = $row['meta_type'];if($meta_type_raw == 'n/A'){$meta_type = "";}
else{$meta_type = $meta_type_raw;}

$meta_year_raw = $row['meta_year'];if($meta_year_raw == 'n/A' OR $meta_year_raw == ''){$meta_year = "";}
								   else{$meta_year = " from $meta_year_raw";}

								   if($meta_type != '' AND $meta_year == ''){$meta_type_and_year = $meta_type;}
								   if($meta_type == '' AND $meta_year != ''){$meta_type_and_year = "$meta_year.";}
								   if($meta_type != '' AND $meta_year != ''){$meta_type_and_year = "$meta_type$meta_year.";}
																				
$meta_directed_by = $row['meta_directed_by'];if($meta_directed_by == 'n/A' OR $meta_directed_by == ''){$meta_directed_by_out = "";}
											 else{$meta_directed_by_out = " Directed by $meta_directed_by.";}

$meta_cast_3o = $row['meta_cast'];if($meta_cast_3o == 'n/A' OR $meta_cast_3o == ''){$meta_cast_3o_out = "";}
								  else{$meta_cast_3o_out = " Starring $meta_cast_3o.";}

$meta_desc_raw = "$meta_type_and_year$meta_directed_by_out$meta_cast_3o_out";

$meta_desc = substr($meta_desc_raw, 0, $result_row_print_length);


?>