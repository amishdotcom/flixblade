<title>Sitemap Generator</title>
<?php
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics RSS Feed Generator</font>";echo "<font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool) (For flixblade)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";

include('../../../switches/cdn.php');
require('../access.php');
?>
<form action="rss-call.php">
 <input type="submit" value="Click to Generate the RSS Feeds">
</form>

<br>
Note:1.The Sitemap Would be Generated as "sitemap.xml", "sitemap-1.xml", "sitemap-2.xml"....at the site root.<br>
&emsp;&emsp;&nbsp;2.Each Sitemap will be generated from the Sitemap lot Number Provided by the Admin.<br>
&emsp;&emsp;&nbsp;3.The Sitemap will not be generated if the data for provided lot number is not available.<br>
&emsp;&emsp;&nbsp;4.Contents of sitemap with lot number '0' can only be edited via the main sitemap-script.php file only via variable $zero_sitemap_content.