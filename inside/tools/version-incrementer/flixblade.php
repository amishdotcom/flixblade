<title>Version Incrementer</title>
<?php
include '../../../switches/cdn.php';
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics SYSTEM Referesher</font>";echo "<font color=\"black\">(A Client End Tool)&nbsp;&nbsp;&nbsp;&nbsp;</font><font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool) (For flixblade)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";

include('../../../switches/cdn.php');
require('../access.php');
?>
<?php
// To Read Current Value Stored in Vault
$file_contents = fopen("../../../system/reset_module/reset-vault.flixblade", "r") or die("Unable to open file!");
$css_res_val_0 = fread($file_contents,filesize("../../../system/reset_module/reset-vault.flixblade"))
?>

<form action="css_js_reset-script.php">
 <input type="submit" value="Click to Increment another version to all CSS,JS & Images (by 0.01)">	[Current : <?php echo $css_res_val_0; ?>]
</form>
<form action="css_js_reset_0.php">
 <input type="submit" value="Click to Reset all CSS,JS & Images Versions to 0">
</form>

<br>
Note:This Tool is Highly Toxic and Should be Only used by Amish Dotcom, any Unauthorized use of this Tool can lead to <?php echo $site_name ?> Website Seizure.