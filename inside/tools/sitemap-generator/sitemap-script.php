<title>Sitemap Generator</title>
<?php
/*----------------------------------------------------------
Cybertronics Sitemap Generator (Coded by Amish Dotcom)  {Confidential}
For Plugs goto https://www.sitemaps.org/protocol.html
*/
include '../../../switches/cdn.php';
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics Sitemap Generator</font>";echo "<font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";
require('../access.php');
include '../../../switches/db.php';

?>

<form method="post" action="">
<h5><center>Generate Sitemap File No: <input type="number"  min="0" name="sfn"></center></h5>
<p><font size="2"><center>Use with Caution!		[0 => Sitemap With only Main links]		[1.... => Sitemaps that are actually created from Main Database]</center></font></p>

<center><input type="submit" name="submit" value="Generate"></center>
</form>

<?php
// Let this script execute forever if it has to
set_time_limit(0);

if(isset($_POST['submit'])){
$sfn = $_POST['sfn'];
					if(isset($sfn)){

$sitemap_presets = "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
";


if($sfn == "0"){
//For 0th (Static Sitemap)
$myfile = fopen('../../../sitemap.xml', 'w') or die("Unable to open file!");

fwrite($myfile, $sitemap_presets);

$zero_sitemap_content = "
<url>
<loc>$site_root/</loc>
<changefreq>monthly</changefreq>
<priority>1.0</priority>
</url>
<url>
<loc>$site_root/about</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/vision</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/policy</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/terms</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/contact</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/dmca</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/masthead</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/developer</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/correction_appeal</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/reportbug</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/hac</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/rbl</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/join_hands</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/siteversion</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
<url>
<loc>$site_root/dbversion</loc>
<changefreq>monthly</changefreq>
<priority>0.9</priority>
</url>
</urlset>
";

fwrite($myfile, $zero_sitemap_content);

fclose($myfile);

echo "<br \>";
echo "The Main Index Sitemap File sitemap.xml [0] has been created";

}


if($sfn != "0"){

//Sitemap Query Limit Calculator
$lim_start = $sfn - 1;
$lim_start = $lim_start * 50000;

$line1 = "<url>\n";
$line2_1 = "<loc>";
$line2_2 = "</loc>\n";
$line3 = "<changefreq>monthly</changefreq>\n";
$line4 = "<priority>0.7</priority>\n";
$line5 = "</url>\n";
$final_line = "</urlset>";

$tmp_set_nouse = false;

//For Verifying if there are rows in current selection for generating a sitemap
try {
    $stmt = $conn->prepare("SELECT id FROM $t1 LIMIT $lim_start,1", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

	$tmp_set_nouse = true;
	
			//For Every Other Sitemap File
		$myfile = fopen("../../../sitemap-$sfn.xml", "w") or die("Unable to open file!");

		fwrite($myfile, $sitemap_presets);

	}
	}catch (PDOException $e) {
    print $e->getMessage();
}

//For title Links
try {
    $stmt = $conn->prepare("SELECT id FROM $t1 ORDER BY id LIMIT $lim_start,50000", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

	  $title_id_mux = "t$row[0]";
	  $title_link_entries = "$title_bridge$title_id_mux/";
	  fwrite($myfile, $line1);
	  fwrite($myfile, $line2_1);
	  fwrite($myfile, $title_link_entries);
	  fwrite($myfile, $line2_2);
	  fwrite($myfile, $line3);
	  fwrite($myfile, $line4);
	  fwrite($myfile, $line5);
	  echo"\n";

	}
  }catch (PDOException $e) {
    print $e->getMessage();
}

fwrite($myfile, $final_line);
fclose($myfile);

try {
	$stmt = $conn->prepare("SELECT id FROM $t1 WHERE LIMIT $lim_start,50000", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt = $conn->prepare("SELECT FOUND_ROWS()", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	
	echo "<br \>";
	echo "The Sitemap has been Generated Successfully";
	echo "<br \>";

	echo "Total Links Generated till sitemap-$sfn.xml => $row[0]<br \>";

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
		echo "No Data Found to Generate Sitemap for File Numbered ($sfn)";

	}

}

					}
}
?>
