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
Note:1.The RSS Feed Would be Generated as "rss-1.xml", "rss-2.xml", "rss-3.xml"....at the site_root/rss/.<br>
&emsp;&emsp;&nbsp;2.Each RSS Feed will be generated from the Feed lot Number Provided by the Admin.<br>
&emsp;&emsp;&nbsp;3.The RSS Feed will not be generated if the data for provided lot number is not available.<br>
