<?php
// Values Verifier

//For Genre
if($dps['genre_without_links'] == 'n/A'){unset($genre);}
else {$genre = $dps['genre_without_links'];}

//For Rated
if($dps['mpaa'] == 'n/A'){unset($mpaa);}
else {$mpaa = $dps['mpaa'];}

//For cast_3_only_without_links
if($dps['cast_3_only_without_links'] == 'n/A'){unset($cast_3_owl);}
else {$cast_3_owl = $dps['cast_3_only_without_links'];}

//For Director
if($dps['director_without_links'] == 'n/A'){unset($director_wl);}
else {$director_wl = $dps['director_without_links'];}

//For Creator
if($dps['creator_without_links'] == 'n/A'){unset($creator_wl);}
else {$creator_wl = $dps['creator_without_links'];}

//For Company
if($dps['company_without_links'] == 'n/A'){unset($company_wl);}
else {$company_wl = $dps['company_without_links'];}

?>
<!-- JSON-LD for schema.org -->
<script type="application/ld+json">{
  "@context": "http://schema.org",
  <?php if(isset($title_type)){ ?>"@type": "<?php echo $title_type; ?>",<?php } ?>
  <?php echo "\n"; ?>  "url": "<?php echo $_SERVER['REQUEST_URI']; ?>",
  <?php if(isset($dps['name'])){ ?>"name": "<?php echo $dps['name']; ?>",<?php } ?>
  <?php if(isset($img_title_path)){ ?><?php echo "\n"; ?>  "image": "<?php echo $img_title_path; ?>",<?php } ?>
  <?php if(isset($genre)){ ?><?php echo "\n" ?>  "genre": [
    <?php $genre = str_replace(", ","\",\n    \"",$genre); echo "\""; echo $genre; echo "\"\n"; ?>
  ],<?php } ?>
  <?php if(isset($dps['mpaa'])){ ?><?php echo "\n"; ?>  "contentRating": "<?php echo $dps['mpaa']; ?>",<?php } ?>
  <?php if(isset($cast_3_owl)){ ?><?php echo "\n"; ?>  "actor": [<?php echo "\n	{\n	  \"@type\": \"Person\",\n	  \"name\": "; ?>"<?php $cast_3_owl = str_replace(", ","\"
    },
	{
      \"@type\": \"Person\",
      \"name\": \"",$cast_3_owl);?><?php echo $cast_3_owl; echo "\"
    }
  ]," ?><?php } ?>
  <?php if(isset($director_wl)){ ?><?php if(strpos($director_wl, ' / ') !== false) { ?><?php echo "\n"; ?>  "director": [<?php echo "\n	{\n	  \"@type\": \"Person\",\n	  \"name\": "; ?>"<?php $director_wl = str_replace(" / ","\"
    },
	{
      \"@type\": \"Person\",
      \"name\": \"",$director_wl);?><?php echo $director_wl; echo "\"
    }
  ]," ?>
  <?php } elseif(strpos($director_wl, ' / ') == false) { ?><?php echo "\n"; ?>  "director": {<?php echo "\n    \"@type\": \"Person\",\n	\"name\": "; ?>"<?php echo $director_wl; echo "\"
  },"; } ?><?php } ?>
  <?php if(isset($creator_wl) OR isset($company_wl)){ ?><?php echo "\n"; ?>  "creator": [<?php if(isset($creator_wl)){ ?><?php echo "\n	{\n	  \"@type\": \"Person\",\n	  \"name\": "; ?>"<?php $creator_wl = str_replace(" / ","\"
    },
	{
      \"@type\": \"Person\",
      \"name\": \"",$creator_wl);?><?php echo $creator_wl; echo "\"
    }" ?><?php } ?>
<?php if(isset($company_wl) AND isset($creator_wl)){ ?><?php echo ",\n	{\n	  \"@type\": \"Organization\",\n	  \"name\": "; ?>"<?php $company_wl = str_replace(" / ","\"
    },
	{
      \"@type\": \"Organization\",
      \"name\": \"",$company_wl);?><?php echo $company_wl; echo "\"
    }" ?><?php } ?>
<?php if(isset($company_wl) AND !isset($creator_wl)){ ?><?php echo "\n	{\n	  \"@type\": \"Organization\",\n	  \"name\": "; ?>"<?php $company_wl = str_replace(" / ","\"
    },
	{
      \"@type\": \"Organization\",
      \"name\": \"",$company_wl);?><?php echo $company_wl; echo "\"
    }" ?><?php } ?>	<?php echo "
  ],"; } ?>
  <?php if(isset($description)){ ?><?php echo "\n"; ?>  "description": "<?php echo $description; ?>",<?php } ?>
  <?php if(isset($release_date_iso_8601)){ ?><?php echo "\n"; ?>  "datePublished": "<?php echo $release_date_iso_8601; ?>",<?php } ?>
  <?php if(isset($runtime_jld)){ ?><?php echo "\n"; ?>  "duration": "<?php echo $runtime_jld; ?>",<?php } ?>
  <?php if(isset($plot_key)){ ?><?php echo "\n"; ?>  "keywords": "<?php echo $plot_key; ?>"<?php } ?>
  
}</script>
