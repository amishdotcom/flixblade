<title>Rss Generator</title>
<?php
/*----------------------------------------------------------
Cybertronics Rss Generator (Coded by Amish Dotcom)  {Confidential}
For Plugs goto https://www.sitemaps.org/protocol.html
*/
include '../../../switches/cdn.php';
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics Rss Generator</font>";echo "<font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";
require('../access.php');
include '../../../switches/db.php';

$entries = "100"; //Total number of entries to generate in 1 Rss Feed

?>

<form method="post" action="">
<p><font size="2"><center>Use with Caution!				[1.... => Rss that are actually created from Main Database (50K in a single file)]</center></font></p>
<h5><center>Generate Rss File No: <input type="number"  min="0" name="sfn"></center></h5>

<center><input type="submit" name="submit" value="Generate"></center>
</form>

<?php
// Let this script execute forever if it has to
set_time_limit(0);

if(isset($_POST['submit'])){
$sfn = $_POST['sfn'];
					if(isset($sfn)){

$rss_presets = "<rss xmlns:media=\"http://search.yahoo.com/mrss/\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\" version=\"2.0\">
<channel>
";
$rss_lastsets = "</channel>
</rss>";

if($sfn != "0"){

//Rss Query Limit Calculator
$lim_start = $sfn - 1;
$lim_start = $lim_start * 50000;

$line1 = "<item>\n";
$line2_1 = "<title>";
$line2_2 = "</title>\n";
$line3_1 = "<link>";
$line3_2 = "</link>\n";
$line4_1 = "<description>";
$line4_2 = "</description>\n";
$line5_1 = "<media:content url=\"";
$line5_2 = "\"> </media:content>\n";
$line6 = "</item>\n";

$tmp_set_nouse = false;

//For Verifying if there are rows in current selection for generating a sitemap
try {
    $stmt = $conn->prepare("SELECT id FROM $t1 LIMIT $lim_start,1", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

	$tmp_set_nouse = true;
	
			//For Every Other Rss File
		$myfile = fopen("../../../rss/rss-$sfn.xml", "w") or die("Unable to open file!");

		fwrite($myfile, $rss_presets);

	}
	}catch (PDOException $e) {
    print $e->getMessage();
}

//For title Links
try {
    $stmt = $conn->prepare("SELECT id,name,year,description,image FROM $t1 ORDER BY id LIMIT $lim_start,$entries", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

	  $title_id_mux = "t$row[0]";
	  $title_link_entries = "$title_bridge$title_id_mux/";
	  
	  $name_year_mux = $row[1];
	  $name_year_mux = preg_replace('/[^A-Za-z0-9. -]/', '', $name_year_mux);
	  $name_year_mux = "$name_year_mux ($row[2])";
	  
	  $decription = "$row[3]";
	  
	  include '../../../includes/functional_engines/image_path_engine.php';
	  
	  if($image == "n/A" or $image == ""  or $image == "image-not-available.jpg"){}else
	  {
	  fwrite($myfile, $line1);
	  fwrite($myfile, $line2_1);
	  fwrite($myfile, $name_year_mux);
	  fwrite($myfile, $line2_2);
	  fwrite($myfile, $line3_1);
	  fwrite($myfile, $title_link_entries);
	  fwrite($myfile, $line3_2);
	  if($decription == "n/A" or $decription == ""){}else
	  {
	  $decription = preg_replace('/[^A-Za-z0-9. -]/', '', $decription);
	  fwrite($myfile, $line4_1);
	  fwrite($myfile, $decription);
	  fwrite($myfile, $line4_2);
	  }
	  fwrite($myfile, $line5_1);
	  fwrite($myfile, $img_title_path);
	  fwrite($myfile, $line5_2);
	  fwrite($myfile, $line6);
	  }
	  echo"\n";

	}
  }catch (PDOException $e) {
    print $e->getMessage();
}

fwrite($myfile, $rss_lastsets);
fclose($myfile);

try {
	$stmt = $conn->prepare("SELECT id FROM $t1 WHERE LIMIT $lim_start,$entries", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt = $conn->prepare("SELECT FOUND_ROWS()", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	
	echo "<br \>";
	echo "The Rss has been Generated Successfully";
	echo "<br \>";

	echo "Total Links Generated till rss-$sfn.xml => $row[0]<br \>";

	include '../../../includes/conn_close.php';
	
echo"<br><br><br><br><br><br><br><br>";
// Script Execution Time
usleep(mt_rand(100, 10000));
// At the end of your script
$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
echo "<b>Total Execution Time :</b> $time seconds\n";

	}
}catch (PDOException $e) {
    print $e->getMessage();
}

if($tmp_set_nouse == false){

		echo "<br \>";
		echo "No Data Found to Generate Rss for File Numbered ($sfn)";

	}

}

					}
}
?>
