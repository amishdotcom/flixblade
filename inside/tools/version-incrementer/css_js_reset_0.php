<title>Reset to 0 Complete</title>
<?php
//Global Includes
include '../../../switches/cdn.php';
/*----------------------------------------------------------
Cybertronics Sitemap Generator (Coded by Amish Dotcom)  {Confidential}
*/
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics SYSTEM Referesher</font>";echo "<font color=\"black\">(A Client End Tool)&nbsp;&nbsp;&nbsp;&nbsp;</font><font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool) (For flixblade)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";
require('../access.php');

$css_res_val_0 = "0";
$reset_switch_vault = fopen("../../../system/reset_module/reset-vault.flixblade", "w") or die("Unable to open file!");
fwrite($reset_switch_vault, $css_res_val_0);
fclose($reset_switch_vault);

$file_contents = fopen("../../../system/reset_module/reset-vault.flixblade", "r") or die("Unable to open file!");
$css_res_val_var_write = '<?php $reset_module = "?v=0"; ?>';
$css_reset_file = fopen("../../../system/reset_module/reset_module.php", "w") or die("Unable to open file!");
fwrite($css_reset_file, $css_res_val_var_write);
fclose($css_reset_file);

echo "All the CSS & JS are now reset to Version 0";

?>

<br><br><br><br>
<form action="flixblade.php">
 <input type="submit" value="Click to go back">
</form>