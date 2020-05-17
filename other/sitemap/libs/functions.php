<?php
/**
 * @param $value
 * @return array|string
 */
function stripslashes_deep($value){

    $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);

    return $value;
}
/**
 * @param string $title
 * @param string $description
 * @param string $element_one
 * @param string $replace_one
 * @param string $element_two
 * @param string $replace_two
 * @param string $social_image
 * @return mixed
 */
function general_meta($title = "", $description = "", $element_one = "", $replace_one = "", $element_two = "", $replace_two = "", $social_image = "") {
    global $db, $member_id, $config;

    $meta['title'] = trim(stripslashes($title));

    $meta['title'] = str_replace($element_one, stripslashes($replace_one), $meta['title']);

    $meta['title'] = str_replace($element_two, stripslashes($replace_two), $meta['title']);

    $meta['description'] = trim(stripslashes($description));

    $meta['description'] = str_replace($element_one, stripslashes($replace_one), $meta['description']);

    $meta['description'] = str_replace($element_two, $replace_two, $meta['description']);

    $meta['keywords'] = create_keywords($meta['title'] . " - " . $meta['description']) . ", " . $config['keyword'];

    if( $social_image )

        $meta['social_image'] = $social_image;

    else $meta['social_image'] = $config['site_url'] ."/templates/" . $config['template'] . "/images/social.png";

    //Get bigger image cover from itunes api
    $meta['social_image'] = str_replace("60x60", "200x200", $meta['social_image']);

    return $meta;
}

/**
 * @param $genre_name
 * @param string $genre_id
 * @return array
 */
function build_top_lyrics($genre_name, $genre_id = "") {
    global $db, $config;
    
    $_WEEK = date("W", time());

    $songs = array();

    $data = load_cache($genre_name . "_" . $_WEEK);

    if($data === false){
        
        $data = file_get_contents("https://itunes.apple.com/us/rss/topsongs/limit=12/genre=" . $genre_id . "/json");
        
        if($data) cache($genre_name . "_" . $_WEEK, $data);

        $data = json_decode($data);

        $data = $data->feed->entry;
        
        if ($data)
        {

            foreach ($data as $result) {

                $song_title = trim($db->safesql($result->{'im:name'}->{'label'}));

                $artist_id = $db->safesql($result->{'im:artist'}->{'attributes'}->{'href'});
                
                $artist_id = explode("/id", $artist_id);
                
                $artist_id = $artist_id[1];
                
                $artist_id = explode("?", $artist_id);
                
                $artist_id = $artist_id[0];
                
                $song['artist_id'] = $artist_id;


                $album_id = $db->safesql($result->{'im:collection'}->{'link'}->{'attributes'}->{'href'});
                
                $album_id = explode("/id", $album_id);
                
                $album_id = $album_id[1];
                
                $album_id = explode("?", $album_id);
                
                $album_id = $album_id[0];
                
                $song['album_id'] = $album_id;

                $artist_name = $db->safesql($result->{'im:artist'}->{'label'});

                $album_name = $db->safesql($result->{'im:collection'}->{'im:name'}->{'label'});

                $hash = gen_uuid($song_title . $artist_name);

                $cover = $result->{'im:image'}[1]->{'label'};

                $artist_hash = gen_uuid($artist_name);
                
                if(trim($cover)) $song['cover'] = $cover; else $song['cover'] = "";

                $song['title'] = $song_title;

                $song['artist'] = $artist_name;

                $song['album'] = $album_name;

                $song['view_url'] = lyrics_url($song_title, $artist_name, $hash);

                $song['search_by_artist'] = search_url($song['artist']);

                if($song_title){
                    
                    $song_title = $db->safesql($song_title);
                    
                    $db->query("INSERT IGNORE INTO `ninacoder_lyrics` (title, artist, hash, cover, album_itunes_id) values ('" . $song_title . "','". $artist_name ."','". $hash ."','" .  $cover ."', '" .  $album_id ."')");
                    
                    $db->query("INSERT IGNORE INTO `ninacoder_artists` (name, hash, itunes_id) values ('". $artist_name ."','" .  $artist_hash . "', '" . $artist_id . "')");
                    
                }
                
                if($song_title) $songs [] = $song;

            }
        }

    } else {

        $data = json_decode($data);

        $data = $data->feed->entry;

        if ($data) {

            foreach ($data as $result) {

                $song_title = trim($db->safesql($result->{'im:name'}->{'label'}));

                $artist_id = $db->safesql($result->{'im:artist'}->{'attributes'}->{'href'});
                $artist_id = explode("/id", $artist_id);
                $artist_id = $artist_id[1];
                $artist_id = explode("?", $artist_id);
                $artist_id = $artist_id[0];
                $song['artist_id'] = $artist_id;


                $album_id = $db->safesql($result->{'im:collection'}->{'link'}->{'attributes'}->{'href'});
                $album_id = explode("/id", $album_id);
                $album_id = $album_id[1];
                $album_id = explode("?", $album_id);
                $album_id = $album_id[0];
                $song['album_id'] = $album_id;


                $artist_name = $db->safesql($result->{'im:artist'}->{'label'});

                $album_name = $db->safesql($result->{'im:collection'}->{'im:name'}->{'label'});

                $hash = gen_uuid($song_title . $artist_name);

                $cover = $result->{'im:image'}[1]->{'label'};

                $artist_hash = gen_uuid($artist_name);

                if (trim($cover)) $song['cover'] = $cover; else $song['cover'] = "";

                $song['title'] = $song_title;

                $song['artist'] = $artist_name;

                $song['album'] = $album_name;

                $song['view_url'] = lyrics_url($song_title, $artist_name, $hash);

                $song['search_by_artist'] = search_url($song['artist']);

                if ($song_title) $songs [] = $song;

            }
        }
    }

    return $songs;

}

/**
 * @param $string
 * @return mixed|null|string|string[]
 */
function file_name($string){

    global $config;

    $string = trim(strip_tags($string));

    $string = preg_replace("/[^a-zA-Z 0-9]+/", "", $string);

    $string = preg_replace("/[[:blank:]]+/"," ",$string);

    $string = str_replace(" ","_",$string);

    return $string;

}

/**
 * @param $text
 * @param string $tags
 * @param bool $invert
 * @return null|string|string[]
 */
function strip_tags_content($text, $tags = '', $invert = FALSE) {

	preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);

	$tags = array_unique($tags[1]);
    
  	if(is_array($tags) AND count($tags) > 0) {

    	if($invert == FALSE) {

      	return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);

    }else { 

      	return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);

    } 
  }elseif($invert == FALSE) {

    	return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);

  }
  
  return $text;

}

/**
 * @return int|string
 */
function CheckCanGzip() {
	
	if( headers_sent() || connection_aborted() || ! function_exists( 'ob_gzhandler' ) || ini_get( 'zlib.output_compression' ) ) return 0;
	
	if( strpos( $_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip' ) !== false ) return "x-gzip";
	if( strpos( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) !== false ) return "gzip";
	
	return 0;
}

/**
 *
 */
function GzipOut() {
	global $Timer, $db;
	
	$ENCODING = CheckCanGzip();
	
	if( $ENCODING ) {

		echo "\n<!-- Script using GzipOut, MySQL queries time: " . round( $db->MySQL_time_taken, 5 ) . " seconds, total MySQL queries: " . $db->query_num . " -->";

		$Contents = ob_get_contents();
		ob_end_clean();
		
		header( "Content-Encoding: $ENCODING" );
		
		$Contents = gzencode( $Contents, 1, FORCE_GZIP );
		echo $Contents;
		
		exit();
	} else {
		//      ob_end_flush(); 
		exit();
	}
}

/**
 * @param $file
 * @param $data
 */
function set_vars($file, $data) {
	
	$filename = ROOT_DIR . '/cache/' . $file . '.php';
	
	$fp = fopen( $filename, 'wb+' );
	fwrite( $fp, serialize( $data ) );
	fclose( $fp );
	
	@chmod( $filename, 0666 );
}

/**
 * @param $file
 * @return bool|mixed
 */
function get_vars($file) {
	$filename = ROOT_DIR . '/cache/' . $file . '.php';
	
	if( ! @filesize( $filename ) ) {
		return false;
	}
	
	return unserialize( file_get_contents( $filename ) );

}

/**
 * @param $text
 * @param $chars_limit
 * @return string
 */
function shorter($text, $chars_limit)
{
    if (strlen($text) > $chars_limit)
    {
        $new_text = substr($text, 0, $chars_limit);
        $new_text = trim($new_text);
        return $new_text . "...";
    }
    else
    {
    return $text;
    }
}

/**
 * @param $string
 * @param int $len
 * @return bool|string
 */
function gen_uuid($string, $len=8)
{
  $hex = md5($string . "vlyrics.co");
  $pack = pack('H*', $hex);
  $uid = base64_encode($pack);
	$uid = preg_replace('/[^a-zA-Z 0-9]+/', "", $uid);
  if ($len<4)
    $len=4;
  if ($len>128)
    $len=128;
  while (strlen($uid)<$len)
    $uid = $uid . gen_uuid(22);
  return substr($uid, 0, $len);
}

/**
 * @param $hash
 * @param $source
 * @param $name
 * @return string
 */
function play_url($hash, $source, $name){
	
	global $config;
	
	$name = trim(strip_tags($name));
	
	$name = preg_replace("/[^a-zA-Z 0-9]+/", " ", $name);
	
	$name = str_replace(" ","-",$name);
	
	$url = $config['site_url'] . "mp3/$source/$name/$hash/";
	
  return $url;
  
}

/**
 * @param $title
 * @param $artist
 * @param $hash
 * @return string
 */
function lyrics_url($title, $artist, $hash){
	
	global $config;
	
	$title = trim(strip_tags($title));
	
	$title = preg_replace("/[^a-zA-Z 0-9]+/", "", $title);
	
	$title = preg_replace("/[[:blank:]]+/"," ",$title);
	
	$title = str_replace(" ","-",$title);
	
	$artist = trim(strip_tags($artist));
	
	$artist = preg_replace("/[^a-zA-Z 0-9]+/", "", $artist);
	
	$artist = preg_replace("/[[:blank:]]+/"," ",$artist);
	
	$artist = str_replace(" ","-",$artist);
	
	$url = $config['site_url'] . "lyrics/$artist/$title-lyrics-$hash.html";

	$url = strtolower($url);

  return $url;
  
}

/**
 * @param $keyword
 * @return string
 */
function search_url($keyword){
	
	global $config;
	
	$keyword = urldecode(trim(strip_tags($keyword)));
	
	$keyword = preg_replace("/[[:blank:]]+/"," ",$keyword);
	
	$keyword = str_replace(" ","+",$keyword);
	
	$url = $config['site_url'] . "search.html?q=" . $keyword;
	
  return $url;
  
}

/**
 * @param $url
 * @return bool|mixed|string
 */
function get_content($url){
	global $config;
	if($config['content_type']){
		require_once INCLUDE_DIR . '/class/_class_curl.php';
		$curl = new Curl;
		return $curl->get($url);
	}else{
		return @file_get_contents($url);
	}
}

/**
 * @param $prefix
 * @return bool|string
 */
function load_cache($prefix) {
	
	$filename = ROOT_DIR . '/cache/' . $prefix . '.tmp';
	
	return @file_get_contents( $filename );
}

/**
 * @param $prefix
 * @param $cache_text
 */
function cache($prefix, $cache_text) {
	
	$filename = ROOT_DIR . '/cache/' . $prefix . '.tmp';
	
	$fp = fopen( $filename, 'wb+' );
	fwrite( $fp, $cache_text );
	fclose( $fp );
	
	@chmod( $filename, 0666 );

}

/**
 * @param bool $cache_area
 */
function clear_cache($cache_area = false) {
	
	$fdir = opendir( ROOT_DIR . '/cache' );
	
	while ( $file = readdir( $fdir ) ) {
		if( $file != '.' and $file != '..' and $file != '.htaccess' and $file != 'system' ) {
			
			if( $cache_area ) {
				
				if( strpos( $file, $cache_area ) !== false ) @unlink( ROOT_DIR . '/cache/' . $file );
			
			} else {
				
				@unlink( ROOT_DIR . '/cache/' . $file );
			
			}
		}
	}
}

/**
 * @param $url
 * @return array|bool|mixed|string|void
 */
function clean_url($url) {
	
	if( $url == '' ) return;
	
	$url = str_replace( "http://", "", strtolower( $url ) );
	if( substr( $url, 0, 4 ) == 'www.' ) $url = substr( $url, 4 );
	$url = explode( '/', $url );
	$url = reset( $url );
	$url = explode( ':', $url );
	$url = reset( $url );
	
	return $url;
}

/**
 * @param $name
 * @param $value
 * @param $expires
 */
function set_cookie($name, $value, $expires) {
	
	if( $expires ) {
		
		$expires = time() + ($expires * 86400);
	
	} else {
		
		$expires = FALSE;
	
	}
	
	if( PHP_VERSION < 5.2 ) {
		
		setcookie( $name, $value, $expires, "/", DOMAIN . "; HttpOnly" );
	
	} else {
		
		setcookie( $name, $value, $expires, "/", DOMAIN, NULL, TRUE );
	
	}
}

/**
 * @param $value
 * @param $charset
 * @return int
 */
function tan_strlen($value, $charset ) {

    if ( strtolower($charset) == "utf-8") return iconv_strlen($value, "utf-8");
    else return strlen($value);

}

/**
 * @param $str
 * @param $start
 * @param $length
 * @param $charset
 * @return bool|string
 */
function tan_substr($str, $start, $length, $charset ) {

    if ( strtolower($charset) == "utf-8") return iconv_substr($str, $start, $length, "utf-8");
    else return substr($str, $start, $length);

}

/**
 * @param $str
 * @param $needle
 * @param $charset
 * @return bool|int
 */
function tan_strrpos($str, $needle, $charset ) {

    if ( strtolower($charset) == "utf-8") return iconv_strrpos($str, $needle, "utf-8");
    else return strrpos($str, $needle);

}

/**
 * @param $content
 * @return string
 */
function create_keywords($content) {
    global$config;

    $keyword_count = 20;
    $newarr = array ();

    $quotes = array ("\x22", "\x60", "\t", "\n", "\r", ",", ".", "/", "¬", "#", ";", ":", "@", "~", "[", "]", "{", "}", "=", "-", "+", ")", "(", "*", "^", "%", "$", "<", ">", "?", "!", '"');
    $fastquotes = array ("\x22", "\x60", "\t", "\n", "\r", '"', "\\", '\r', '\n', "/", "{", "}", "[", "]" );

    $content = str_replace( "&nbsp;", " ", $content );
    $content = str_replace( '<br />', ' ', $content );
    $content = preg_replace( "#&(.+?);#", "", $content );
    $content = trim(str_replace( " ,", "", stripslashes( $content )));

    $content = str_replace( $fastquotes, '', $content );

    $content = str_replace( $quotes, ' ', $content );

    $arr = explode( " ", $content );

    foreach ( $arr as $word ) {
        if( tan_strlen( $word, $config['charset'] ) > 4 ) $newarr[] = $word;
    }

    $arr = array_count_values( $newarr );
    arsort( $arr );

    $arr = array_keys( $arr );

    $total = count( $arr );

    $offset = 0;

    $arr = array_slice( $arr, $offset, $keyword_count );

    $keywords = implode( ", ", $arr );

    return $keywords;
}

/**
 * @return string
 */
function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    }else{
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}


?>