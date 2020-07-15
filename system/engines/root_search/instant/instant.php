<?php
error_reporting(0);
//Instant Live Search (Author: Amish Dotcom)
include '../../../../switches/db.php';

	$keyword = trim($_GET['term']); // this is user input

	$sugg_json = array();    // this is for displaying json data as a autosearch suggestion
	$json_row = array();     // this is for stroring mysql results in json string


	$keyword = preg_replace('/\s+/', ' ', $keyword); // it will replace multiple spaces from the input.

			//----Filtering and Formatting for Input----//
			//Removing the Brackets from Input
			//$keyword = str_replace(array( '(', ')' ), '', $keyword);
			//Removing Dots from Input
			$keyword = str_replace(".", "", $keyword);
			//Removing the emdash
			//$keyword = str_replace('-', '', $keyword);
			//Removing the Banned Keywords
			$keyword = str_replace('title', '', $keyword);
			$keyword = str_replace('Movie', '', $keyword);
			$keyword = str_replace('Short Film', '', $keyword);
			$keyword = str_replace('TV Series', '', $keyword);
			$keyword = str_replace('TV Movie', '', $keyword);
			$keyword = str_replace('TV Episode', '', $keyword);
			$keyword = str_replace('Video', '', $keyword);
			$keyword = str_replace('Mini TV Series', '', $keyword);
			$keyword = str_replace('TV Special', '', $keyword);
			//Removing the Special Characters from Input
			$keyword = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $keyword);

	//If Input is a Special Character then Shuffle the Results
	if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', trim($_GET['term'])) OR preg_match('/'.preg_quote('^\'£$%^&*()}{@#~?><,@|-=-_+-¬', '/').'/', trim($_GET['term'])) OR trim($_GET['term']) == ":" OR trim($_GET['term']) == "/" OR trim($_GET['term']) == "." OR trim($_GET['term']) == '"' OR trim($_GET['term']) == ";" OR trim($_GET['term']) == "[" OR trim($_GET['term']) == "]" OR trim($_GET['term']) == "!" OR trim($_GET['term']) == "title" OR trim($_GET['term']) == "Movie" OR trim($_GET['term']) == "Short Film" OR trim($_GET['term']) == "TV Series" OR trim($_GET['term']) == "TV Movie" OR trim($_GET['term']) == "TV Episode" OR trim($_GET['term']) == "Video" OR trim($_GET['term']) == "Mini TV Series" OR trim($_GET['term']) == "TV Special" OR trim($_GET['term']) == "-"){
														$query = "SELECT meta_instant, meta_instant_2, meta_id FROM $t2 WHERE meta_instant LIKE :term OR meta_instant_2 LIKE :term ORDER BY RAND() LIMIT 11"; // select query

														}
	//If Input isn't a Special Character then Don't Shuffle the Results
	else{
	$query = "SELECT meta_instant, meta_instant_2, meta_id FROM $t2 WHERE meta_instant LIKE :term OR meta_instant_2 LIKE :term LIMIT 11"; // select query
		}

	//LIMIT 11 to limit Showing of 11 Search Results Only (Above in Query)

	$stmt = $conn->prepare( $query );
	$stmt->execute(array(':term'=>"%$keyword%"));

	if ( $stmt->rowCount()>0 ) {
		
		while($recResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
															//----Meta URL Formatter----//
															//Meta URL Prefixer
															$meta_url_raw = $recResult['meta_id'];
															$meta_url_raw = "t$meta_url_raw";
															$meta_url_trace = substr($meta_url_raw, 0,1);
															if($meta_url_trace == "t"){$meta_id = "$site_root/title/$meta_url_raw";}
															
															$json_row["id"] = $meta_id;
															$json_row["value"] = "";
															$json_row["label"] = $recResult['meta_instant'];
															array_push($sugg_json, $json_row);
															}
								} else {
										$json_row["id"] = "#";
										$json_row["value"] = "";
										$json_row["label"] = "Nothing Found!";
										array_push($sugg_json, $json_row);
										}
	
	$jsonOutput = json_encode($sugg_json, JSON_UNESCAPED_SLASHES); 
	print $jsonOutput;

?>
