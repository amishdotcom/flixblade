<?php
//Includes
//----------------------------

//Global Includes
include '../../switches/cdn.php';
include '../../switches/db.php';
include '../../system/reset_module/reset_module.php';
?>
<?php
//Core Functional Includes
include '../../includes/core_functional_includes_caller_title.php';

//Page Title, Description & Keywords
include '../../includes/page_title_engine.php';
include '../../includes/headers_data/title_page_description.php';
include '../../includes/headers_data/title_page_keywords.php';

//Central Header Include
include '../../includes/central_header.php';

//UI Include
include("title_inside/ui_title.php");

?>
  </head>

  <body>
<?php

//Ads Code Include
include '../../includes/ad_unit.php';

//Core Functional Includes
include("title_inside/index.php");
include '../../includes/central_footer.php';
include '../../includes/conn_close.php';
?>

  </body>
</html>