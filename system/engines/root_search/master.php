<?php
include 'switches/cdn.php';

//Includes
//----------------------------
//Page Description & Keywords
$page_title = "$site_name - $site_tagline";
$desc="Search anything about Movies, TV Shows, TV Series, Videos, etc in $site_name's database";
$keys="flix, blade, Movies, TV Shows, TV Series, Videos, Release Dates, Directory, Movie Database";

//Global Includes
include 'switches/db.php';
include 'system/reset_module/reset_module.php';

//Page Defination
$page_type = 'root_index';

//Central Header Include
include 'includes/central_header.php';
?>
  </head>

  <body>
<?php

//Ads Code Include
include 'includes/ad_unit.php';

//Core Functional Includes
include("system/engines/root_search/index.php");

include 'includes/conn_close.php';
?>


  </body>
</html>