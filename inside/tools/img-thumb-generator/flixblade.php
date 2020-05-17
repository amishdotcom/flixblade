<title>Image Thumbnails Generator</title>
<?php
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics Image Thumbnails Generator</font>";echo "<font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool) (For flixblade)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";

include('../../../switches/cdn.php');
require('../access.php');
?>
<form action="img-thumb-generator-call.php">
 <input type="submit" value="Click to Generate Image Thumbnails">
</form>

<br>
Note:1.This Tool Only Generates Thumbnails(Resizes) them for the flixblade's Image CDN in tmp directory.
<br>&emsp;&emsp;&nbsp;2.Please after then move the images/thumbs onto their real location over the server(part no.)
<br>&emsp;&emsp;&nbsp;3.Images will be Rewritten even if they are Present in the location.