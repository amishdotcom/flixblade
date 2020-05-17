<title>URL Files Generator</title>
<?php
//Global Includes
include '../../../switches/cdn.php';
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics URL Files Generator (for 'title' pages)</font>";echo "<font color=\"black\">&nbsp;&nbsp;&nbsp;&nbsp;</font><font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool) (For flixblade)</font>";
echo "<br \>";
echo "<br \>";
require('../access.php');
include '../../../switches/db.php';
?>

<?php
//For title Files
$dir_title = "../../../title";

//To Initially Compiler the Previous State of the Directory
// Returns array of files
$files = scandir($dir_title);
// Count number of files and store them to variable..
$num_files = count($files)-2;

$firstFile = scandir("$dir_title")[2];
$lastFile = scandir("$dir_title")[$num_files+1];
echo "Initial Directory Info =><br>";
echo "Current Total Number of Files in title Directory : $num_files<br>";
echo "First File Name : $firstFile<br>";
echo "Last File Name : $lastFile";
?>

<form method="post" action="">
<h5><center>Start From (Database ID No.): <input type="text" name="start_from"> Upto (Database ID No.): <input type="text" name="finish_upto"></center></h5>
<p><font size="2"><center>Use with Caution!</center></font></p>

<center><input type="submit" name="submit" value="Generate"></center>
</form>

<?php
// Let this script execute forever if it has to
set_time_limit(0);

if(isset($_POST['submit'])){
$sf = $_POST['start_from'];
$fu = $_POST['finish_upto'];
					if(isset($sf)){
						if(isset($fu)){

mkdir("$dir_title");
try {
    $stmt = $conn->prepare("SELECT id FROM $t1 where ID BETWEEN $sf AND $fu", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

	mkdir("$dir_title/t$row[0]");
	$myfile = fopen("$dir_title/t$row[0]/flixblade.php", "w") or die("Unable to open file!");
	$part1 = '<?php $id=\'';
	$part2 = '\';$page_type=\'title\';include\'../../system/engines/title_engine/title_engine.php\'?>';
	fwrite($myfile, $part1);
	fwrite($myfile, $row[0]);
	fwrite($myfile, $part2);
	fclose($myfile);
	}}catch (PDOException $e){print $e->getMessage();}

echo "All Files were Generated Successfully<br \><br \><br \>";
echo "Files Generated [in 'title' Directory] =>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//For Files Counting and Info Displaying (title)

//For Fetching total files generated
try{$stmt = $conn->prepare("SELECT COUNT(id) FROM $t1 where ID BETWEEN $sf AND $fu", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	echo "<font color=\"red\" face=\"Arial\">$row[0] Total [From => t$sf - t$fu]</font>&nbsp;&nbsp;&nbsp;";
	}}catch (PDOException $e){print $e->getMessage();}


//To Compiler the State of the Directory after the Operation
// Returns array of files
$files = scandir($dir_title);
// Count number of files and store them to variable..
$num_files = count($files)-2;

$firstFile = scandir("$dir_title")[2];
$lastFile = scandir("$dir_title")[$num_files+1];
echo "<br><br>Directory Info (After Update) =><br>";
echo "Current Total Number of Files in title Directory : $num_files<br>";
echo "First File Name : $firstFile<br>";
echo "Last File Name : $lastFile";


echo "<br><br><br><br><br><br>";
echo "<form action=\"url-files-generator-call.php\">";
echo " <input type=\"submit\" value=\"Regenerate the Files\">";
echo "</form>";

include '../../includes/conn_close.php';

echo"<br><br><br><br><br><br><br><br>";
// Script Execution Time
usleep(mt_rand(100, 10000));
// At the end of your script
$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
echo "<b>Total Execution Time :</b> $time seconds\n";

					}}
}
?>