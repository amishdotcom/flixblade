<?php
//Includes
//----------------------------

$page_type = 'serp';
$result_row_print_length = '439';
//Global Includes
include 'switches/cdn.php';
include 'system/reset_module/reset_module.php';
//Page Title
include 'includes/page_title_engine.php';
//Central Header Include
include 'switches/header_switches/masthead.php';
include 'includes/central_header.php';
?>

<!-- Combined Includes-->
<link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/ui_search<?php echo $reset_module ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/js/jquery/ui/1.10.1/themes/base/minified/jquery-ui.min<?php echo $reset_module ?>">
<script type="text/javascript" src="<?php echo $site_root ?>/system/js/jquery/jquery-1.9.1.min<?php echo $reset_module ?>"></script>
<script type="text/javascript" src="<?php echo $site_root ?>/system/js/jquery/ui/1.10.1/jquery-ui.min<?php echo $reset_module ?>"></script>
<script type="text/javascript" src="<?php echo $site_root ?>/system/engines/root_search/instant/instant_search_serp<?php echo $reset_module ?>"></script>
<!---->

<!-- The main Navigation Bar -->
<?php
include 'includes/central_navig_bar.php';
?>

<!---->

<!-- flixblade Search Bar -->
<form method="get" action="<?php echo $search_page_loc ?>" onsubmit="return do_search()">
<input id="q" type="text" name="q" placeholder="Search flixblade" class="auto" minlength='3' maxlength='2048'>
</form>
<!---->

<h1 class="page_head text-center">flixblade Search</h1>
<hr/>
  </head>

  <body>
<div id="result_div">
<?php
include 'switches/db.php';
if(isset($_GET['q']))
{

		if  ( ($_GET['q']) != (empty(trim($_GET['q']))) AND (preg_match('/^\S{2}.*\S$/', ($_GET['q']))))
		//1st if.To check if the input isn't only blank spaces.
		//2nd if.To check whether the input begins and ends with character other than space and also run only if a string has more than 2 characters.
		{
				$keyword = trim($_REQUEST['q']); // this is user input

				//Checking if the Keyword is not a Banned Keyword
				if($keyword != "title" AND $keyword != "Movie" AND $keyword != "Short Film" AND $keyword != "TV Series" AND $keyword != "TV Movie" AND $keyword != "TV Episode" AND $keyword != "Video" AND $keyword != "Mini TV Series" AND $keyword != "TV Special")
				{

						$get_query = preg_replace('/\s+/', '+', $keyword);
						echo"<li class = \"srcf\"><span class=\"sf\"> You searched for</span> $keyword</li>\n";

						//----Filtering and Formatting for Input----//
						//Removing the Brackets from Input
						$keyword = str_replace(array( '(', ')' ), '', $keyword);
						//Removing Dots from Input
						$keyword = str_replace(".", "", $keyword);
						//Removing the emdash
						$keyword = str_replace('-', '', $keyword);
						//Removing the Keywords like album, track, tracklist, lyrics, video
						$keyword = str_replace('title', '', $keyword);
						$keyword = str_replace('Movie', '', $keyword);
						$keyword = str_replace('Short Film', '', $keyword);
						$keyword = str_replace('TV Series', '', $keyword);
						$keyword = str_replace('TV Movie', '', $keyword);
						$keyword = str_replace('TV Episode', '', $keyword);
						$keyword = str_replace('Video', '', $keyword);
						$keyword = str_replace('Mini TV Series', '', $keyword);
						$keyword = str_replace('TV Special', '', $keyword);
						$keyword = str_replace('-', '', $keyword);
						//Removing the Special Characters from Input
						$keyword = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $keyword);

						$keyword = preg_replace('/\s+/', ' ', $keyword); // it will replace multiple spaces from the input.
						
						//Search Queries ----------------------------------
						$query = "SELECT meta_instant, meta_name, meta_type, meta_year, meta_directed_by, meta_cast, meta_search_meta, meta_id FROM $t2 WHERE meta_instant LIKE '%$keyword%' OR meta_search_meta LIKE '%$keyword%'"; // select query


						//Search Queries ----------------------------------


						//Pagination ----------------------------------

						/*
						 * Show all errors (not required of course)
						 */
						ini_set('display_errors','On');
						error_reporting(-1);


						/*
						 * Include the pagination.php class file
						 */
						require_once('includes/Pagination.php');


						/*
						 * Get and/or set the page number we are on
						 */
						if(isset($_GET['page'])) {
												 $page = $_GET['page'];
												 }
						else {
							 $page = 1;
							 }


						/*
						 * Set a few of the basic options for the class, replacing the URL with your own of course
						 */
						$options = array(
										'db_handle' => $conn
										);


						/*
						 * Create the pagination object
						 */
						try {
							$paginate = new pagination($page, "$query", $options);	
							}catch(paginationException $e){
														   echo $e;
														   exit();
														  }


						/*
						 * If we get a success, carry on
						 */
						if($paginate->success == true) {
														/*
														 * Echo out the total number of results
														 */
														echo '<p class = "tr">Total Results: '.$paginate->total_results.'</p>';

														/*
														 * Echo out the total number of pages
														 */
														echo '<p class = "tp">Total Pages: '.$paginate->total_pages.'</p>';
														echo "\n<br><br>";
														/*
														 * Fetch our results
														 */
														$result = $paginate->resultset->fetchAll();
													   }


						//Pagination ----------------------------------


						$stmt = $conn->prepare($query);
						$stmt->execute(array(':q'=>"%$keyword%"));
						
						if ( $stmt->rowCount()>0 ) {
													foreach($result as $row) {
																				include 'includes/functional_engines/serp_meta_desc_engine.php';
																					
																				//Meta URL Prefixer
																				$meta_url_raw = $row['meta_id'];
																				$meta_url_raw = "t$meta_url_raw";
																				$meta_url_trace = substr($meta_url_raw, 0,1);
																				if($meta_url_trace == "t"){$meta_url_prefix = "title";}
																					
																					
																					echo "<li><a href='$site_root/".$meta_url_prefix."/".$meta_url_raw."/'><span class='title'>".$row['meta_name']."</span></a><br><span class='desc'>".$meta_desc."</span></li>\n";
																			}
													
												 } else {
														echo "Your search - <b>$keyword</b> - did not match any results.<br><br>Suggestions:<br><ul><li style=\"list-style-type:disc\">Make sure that all words are spelled correctly.</li><li style=\"list-style-type:disc\" class=\"lif\">Try different keywords.</li><li style=\"list-style-type:disc\" class=\"lif\">Try more general keywords.</li><li style=\"list-style-type:disc\" class=\"lif\">Try some autosuggest.</li></ul><style>.ctr-p{position:fixed;bottom:0%;width:100%}.pagination,.srcf,.tr,.tp{display:none}</style>";
														}

						//Pagination ----------------------------------
					if($paginate->success == true)
					{
						/*
						 * Echo out the UL with the page links
						 */
						echo '<p>'.$paginate->links_html.'</p>';

					}
						//Pagination ----------------------------------

					//Less Rows Condition Footer Handler
					if ( $stmt->rowCount()<=3 ){echo "<style>.ctr-p{position:fixed;bottom:0%;width:100%}</style>";}

				} else {echo "The Keyword <span class=\"sf\">$keyword</span> is blocked<style>.ctr-p{position:fixed;bottom:0%;width:100%}</style>";}
		} else {
				echo "Your input doesn't seems to be valid.<br><br>Here is what might have happened:<br><ul><li style=\"list-style-type:disc\">Input is empty or contains only spaces.</li><li style=\"list-style-type:disc\" class=\"lif\">Your input contains a space either at beginning or at the end.</li><li style=\"list-style-type:disc\" class=\"lif\">You typed less than 2 characters. flixblade search requires more than two characters to be typed.</li></ul><style>.ctr-p{position:fixed;bottom:0%;width:100%}</style>";
			   }
} else {echo "Don't try to hack me. I am Smarter than you.";}

?>

</div>

<div class="ctr-p" id="footer"><div id="fbarcnt" style="height:auto;visibility:visible"><div id="footcnt"><div class="EvHmz hRvfYe" id="fbar"><div class="fbar"><div class="b2hzT"></div><span id="fsl"><a class="cyber Fx4vi" href="http://cybertronics.org.in">Cybertronics</a><a class="donate Fx4vi" href="<?php echo "$site_root/donate" ?>">Donate</a><a class="dmca Fx4vi" href="<?php echo "$site_root/dmca" ?>">DMCA</a></span><span style="display:inline-block;position:relative"><a class="cora Fx4vi" href="<?php echo "$site_root/correction_appeal" ?>">Correction Appeal</a><a class="developer Fx4vi" href="<?php echo "$site_root/developer" ?>">Developer</a><a class="privacy Fx4vi" href="<?php echo "$site_root/policy" ?>">Privacy Policy</a><a class="terms Fx4vi" href="<?php echo "$site_root/terms" ?>">Terms</a><a class="cont Fx4vi" href="<?php echo "$site_root/contact" ?>">Contact Us</a><a class="abt Fx4vi" href="<?php echo "$site_root/about" ?>">About</a></span></div></div></div>   </div></div>

  </body>
</html>