<?php
/**
 * 2018 NiNaCoder
 * @author: NiNaCoder <ninacoder2510@gmail.com>
 * © 2018 NiNaCoder https://ninacoder.com
 * International Registered Trademark & Property of NiNaCoder
 */

@session_start ();

@ob_start ();

@ob_implicit_flush ( 0 );

@error_reporting ( E_ALL ^ E_NOTICE );

@ini_set ( 'display_errors', true );

@ini_set ( 'html_errors', true );

@ini_set ('display_startup_errors', true);

@ini_set ( 'error_reporting', E_ALL ^ E_NOTICE );

define ( 'ROOT_DIR', dirname ( ".." ) );

define ( 'INCLUDE_DIR', __DIR__ );

if (!file_exists(INCLUDE_DIR.'/config.inc.php')) {

    die ( "Lyrics Search Engine not installed. Please run install/index.php" );

}

require_once (INCLUDE_DIR . '/config.inc.php');

require_once INCLUDE_DIR . '/class/_class_mysql.php';

require_once INCLUDE_DIR . '/db.php';

require(ROOT_DIR . '/libs/functions.php');