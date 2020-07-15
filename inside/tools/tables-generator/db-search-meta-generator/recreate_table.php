<title>Search Meta Table Recreator</title>
<?php
/*----------------------------------------------------------
Cybertronics Sitemap Generator (Search Meta Table Resetter) (Coded by Amish Dotcom)  {Confidential}
*/
include '../../../../switches/cdn.php';
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics Database Search Meta(Table) Generator</font>";echo "<font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool) (For flixblade)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";
require('../../access.php');
include '../../../../switches/db.php';
?>

<form method="post" action="">
<p><font size="2"><center>Use with Caution!</center></font></p>

<center><input type="submit" name="rct" onclick="return confirm('Are you sure. You want to Recreate Search Meta Table?')" value="Recreate Table"></center>
</form>

<?php
// Let this script execute forever if it has to
set_time_limit(0);

if(isset($_POST['rct'])){

//Search Meta Table Dropper
try {
$stmt = $conn->prepare("DROP TABLE $t2");
$stmt->execute();}
catch(PDOException $e){echo "Error: " . $e->getMessage();}

//Search Meta Table and Columns Creator
$sm_columns = "(
     meta_id INT( 11 ) PRIMARY KEY DEFAULT '0',
     meta_instant longtext COLLATE 'utf8_general_ci' UNIQUE,
	 meta_instant_2 longtext COLLATE 'utf8_general_ci' UNIQUE,
	 meta_name longtext COLLATE 'utf8_general_ci',
	 meta_type varchar(255) COLLATE 'utf8_general_ci',
	 meta_year varchar(255) COLLATE 'utf8_general_ci',
	 meta_directed_by longtext COLLATE 'utf8_general_ci',
	 meta_cast longtext COLLATE 'utf8_general_ci',
     meta_search_meta longtext COLLATE 'utf8_general_ci');";

try {
$stmt = $conn->prepare("CREATE TABLE IF NOT EXISTS $t2 $sm_columns ");
$stmt->execute();}
catch(PDOException $e){echo "Error: " . $e->getMessage();}

echo "<br><br><br><br><font color=\"red\" size=\"18\" face=\"Arial\"><center>Table Recreated !!</center></font>";

}
?>
