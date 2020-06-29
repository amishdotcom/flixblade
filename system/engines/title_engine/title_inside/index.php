<?php $page_type = 'title'; ?>
<br><br>
<!-- Title & Year(Joint) Specific -->
<?php //If Title Name is greator than 40 than reduce its font size ?>
<h1 class="movie_name"<?php if(strlen($dps['name']) > 40){echo" style=\"font-size:22px\"";} ?>><span>&nbsp;&nbsp;<?php if(isset($dps['name'])){echo $dps['name'];} ?></span>&nbsp;<span class="title_year"><?php if(isset($dps['year'])){echo "(".$dps['year'].")" ;} ?></span></h1>

<?php
	if(empty($dps['name']) AND empty($dps['year']) AND empty($image) AND empty($img_media_path) AND empty($dps['originalTitle']) AND empty($title_type) AND empty($dps['genre_without_links']) AND empty($is_adult) AND empty($end_year) AND empty($runtime) AND empty($dps['release_date']) AND empty($dps['language_without_links']) AND empty($dps['mpaa']) AND empty($director_wl) AND empty($writer_wl) AND empty($dps['cast_3_only_without_links']) AND empty($description) AND empty($plot) AND empty($tagline) AND empty($aka) AND empty($company_wl) AND empty($country_wl) AND empty($creator_wl) AND empty($certification) AND empty($location_wl) AND empty($budget) AND empty($gross) AND empty($aspect_ratio) AND empty($color) AND empty($sound_mix) AND empty($awards) AND empty($seasons_wl) AND empty($full_cast)){
	echo "<br><br><div class=\"text-center\" style=\"font-weight:bold;color:red\">No Data</div><br>";
	}
?>

<?php
//Special Characters Removal from a String for Correct Displaying on Mobile Screens
$mob_name = preg_replace('/[^A-Za-z0-9. -]/', '', $dps['name']);
?>

<script>
if ( $(window).width() < 560) {
  //Add your javascript for large screens here
  document.write('<br><img class="mobile_Img_thumb_display" id="myImg" src="<?php if(isset($image)){echo "$img_title_thumb_path";} ?>"<?php if((isset($mob_name) AND ($image != 'image-not-available.jpg'))){echo " alt=\"$mob_name Poster\" title=\"$mob_name Poster\"";} ?>><br>');
}
</script>

<br>
<!-- Table 1 (Title Main Table) -->
<table class="table_main_01">
 <tr>
  <td class="thumb_box"  rowspan="12">
   <!-- Loading Image into Table -->
   <div id="title_image">
    <img class="img-thumbnail" id="myImg" src="<?php if(isset($image)){echo "$img_title_thumb_path";} ?>"<?php if((isset($dps['name'])) AND ($image != 'image-not-available.jpg')){echo " alt=\"".$dps['name']." Poster\" title=\"".$dps['name']." Poster\"";} ?>>
    <?php if($image != 'image-not-available.jpg'){ ?>
	<div id="myModal" class="modal">
     <span class="close">&times;</span>
     <img class="modal-content" id="img01" src="<?php if(isset($image)){echo "$img_title_path";} ?>"<?php if((isset($dps['name'])) AND ($image != 'image-not-available.jpg')){echo " alt=\"".$dps['name']." Poster\" title=\"".$dps['name']." Poster\"";} ?>>
     <div id="caption"><?php if(isset($dps['name'])){echo $dps['name'];} ?></div>
    </div>
	<?php } ?>
   <script type="text/javascript" src="<?php echo $site_root ?>/system/js/main_image_loader<?php echo $reset_module ?>"></script>
   </div>
   <!---->
  </td>
  <?php if(isset($dps['originalTitle'])){ ?><td class="originalTitle_head">Original Title:&nbsp;</td><td><?php echo $dps['originalTitle']; ?></td><?php } ?></tr>
<?php if(isset($title_type)){ ?><tr><td class="title-type_head">Type:&nbsp;</td><td><?php echo $title_type; ?></td></tr><?php } ?>
 <?php if(isset($dps['genre_without_links'])){ echo "\n"; ?><tr><td class="genre_head">Genre:&nbsp;</td><td><?php echo $dps['genre_without_links']; ?></td></tr><?php } ?>
 <?php if(isset($end_year)){ echo "\n"; ?><tr><td class="se_year_head">From / To:&nbsp;</td><td><?php echo $dps['startYear']; echo " - $end_year"; ?></td></tr><?php } ?>
 <?php if(isset($runtime)){ echo "\n"; ?><tr><td class="runtime_head">Runtime:&nbsp;</td><td><?php echo $runtime; ?></td></tr><?php } ?>
 <?php if(isset($dps['release_date'])){ echo "\n"; ?><tr><td class="release_date_head">Release Date:&nbsp;</td><td><?php echo $dps['release_date']; ?></td></tr><?php } ?>
 <?php if(isset($is_adult)){ echo "\n"; ?><tr><td class="is_adult_head">Is Adult:&nbsp;</td><td><?php echo $is_adult; ?></td></tr><?php } ?>
 <?php if(isset($dps['language_without_links'])){ echo "\n"; ?><tr><td class="language_head">Language:&nbsp;</td><td><div<?php if(strlen($dps['language_without_links']) > 50) { echo " class=\"long_txt_expnd\""; } ?>><?php echo $dps['language_without_links']; ?></div></td></tr><?php } ?>
 <?php if(isset($dps['mpaa'])){ echo "\n"; ?><tr><td class="rated_head">Rated:&nbsp;</td><td><?php echo $dps['mpaa']; ?></td></tr><?php } ?>
 <?php if(isset($director_wl)){ echo "\n"; ?><tr><td class="director_head">Director:&nbsp;</td><td><div<?php if(strlen($director_wl) > 50) { echo " class=\"long_txt_expnd\""; } ?>><?php echo $director_wl; ?></div></td></tr><?php } ?>
 <?php if(isset($writer_wl)){ echo "\n"; ?><tr><td class="writers_head">Writer:&nbsp;</td><td><div<?php if(strlen($writer_wl) > 50) { echo " class=\"long_txt_expnd\""; } ?>><?php echo $writer_wl; ?></div></td></tr><?php } ?>
 <?php if(isset($dps['cast_3_only_without_links'])){ echo "\n"; ?><tr><td class="stars_head">Stars:&nbsp;</td><td><div<?php if(strlen($dps['cast_3_only_without_links']) > 50) { echo " class=\"long_txt_expnd\""; } ?>><?php echo $dps['cast_3_only_without_links']; ?> &nbsp;<?php if(isset($full_cast) AND (strlen($dps['cast_3_only_without_links']) > 25)){ ?><a href="full_cast" class="flstrs" data-toggle="modal" data-target="#full_cast">»</a><?php } ?></div></td></tr><?php } ?>

</table>

<?php if(isset($full_cast)){ ?>
<!-- Modal -->
<div class="modal fade" id="full_cast" tabindex="-1" role="dialog" aria-labelledby="full_cast_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="full_cast_modal">Full Cast List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $full_cast ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>


<?php if(isset($description)){ ?>
<br><br><br><br>
<div class="card text-center description_card">
  <div class="card-header">
    <h4>Description</h4>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $description; ?></p>
  </div>
</div>
<?php } ?>

<?php if(isset($plot)){ ?>
<br><br><br>
<div class="card text-center plot_card">
  <div class="card-header">
    <h4>Plot</h4>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $plot; ?></p>
  </div>
</div>
<?php } ?>

<?php if(isset($tagline)){ ?>
<br><br><br>
<div class="card text-center tagline_card">
  <div class="card-header">
    <h4>Tagline</h4>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $tagline; ?></p>
  </div>
</div>
<?php } ?>

<?php if(isset($aka) OR isset($company_wl) OR isset($country_wl) OR isset($creator_wl) OR isset($certification) OR isset($location_wl)){ ?>
<br><br><br><br>
<div class="card text-center details_card">
  <div class="card-header">
    <h4>Details (General)</h4>
  </div>
  <?php if(isset($aka)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">AKA (Also Known As)</h5>
	<p class="card-text d-content"><?php echo $aka; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($company_wl)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Company</h5>
	<p class="card-text d-content"><?php echo $company_wl; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($country_wl)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Country</h5>
	<p class="card-text d-content"><?php echo $country_wl; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($creator_wl)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Creator</h5>
	<p class="card-text d-content"><?php echo $creator_wl; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($certification)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Certification</h5>
	<p class="card-text d-content"><?php echo $certification; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($location_wl)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Location</h5>
	<p class="card-text d-content"><?php echo $location_wl; ?></p>
  </li>
  <?php } ?>
</div>
<?php } ?>


<?php if(isset($budget) OR isset($gross)){ ?>
<br><br><br><br>
<div class="card text-center details_card">
  <div class="card-header">
    <h4>Details (Financial)</h4>
  </div>
  <?php if(isset($budget)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Budget</h5>
	<p class="card-text d-content"><?php echo $budget; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($gross)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Gross</h5>
	<p class="card-text d-content"><?php echo $gross; ?></p>
  </li>
  <?php } ?>
</div>
<?php } ?>

<?php if(isset($aspect_ratio) OR isset($color) OR isset($sound_mix)){ ?>
<br><br><br><br>
<div class="card text-center details_card">
  <div class="card-header">
    <h4>Details (Technical)</h4>
  </div>
  <?php if(isset($aspect_ratio)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Aspect Ratio</h5>
	<p class="card-text d-content"><?php echo $aspect_ratio; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($color)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Color</h5>
	<p class="card-text d-content"><?php echo $color; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($sound_mix)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Sound Mix</h5>
	<p class="card-text d-content"><?php echo $sound_mix; ?></p>
  </li>
  <?php } ?>
</div>
<?php } ?>

<?php if(isset($awards) OR isset($seasons_wl)){ ?>
<br><br><br><br>
<div class="card text-center details_card">
  <div class="card-header">
    <h4>Details (Other)</h4>
  </div>
  <?php if(isset($awards)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Awards</h5>
	<p class="card-text d-content"><?php echo $awards; ?></p>
  </li>
  <?php } ?>
  <?php if(isset($seasons_wl)){ ?>
  <li class="list-group-item">
	<h5 class="card-title">Seasons</h5>
	<p class="card-text d-content"><?php echo $seasons_wl; ?></p>
  </li>
  <?php } ?>
</div>
<?php } ?>

<br>

<?php
include '../../includes/title-json-ld_engine.php';
?>

