<title>URL Files Generator</title>
<?php
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics URL Files Generator</font>";echo "<font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool) (For flixblade)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";

include('../../../switches/cdn.php');
require('../access.php');
?>
<form action="url-files-generator-call.php">
 <input type="submit" value="Click to Run the Files Generator (for 'title' pages)">
</form>

<br>
Note:1.This Tool will Actually write the files on the Disk.
<br>&emsp;&emsp;&nbsp;2.The Script will generate the entitled directories and files in them according to user's input for Database ID No.
<br>&emsp;&emsp;&nbsp;3.If you Stopped the Script in between then the Script may show Errors, in the case just restart the Script.
<br>&emsp;&emsp;&nbsp;4.If you Re-run the script for same parameters then it may just recreate the missing files and directories.