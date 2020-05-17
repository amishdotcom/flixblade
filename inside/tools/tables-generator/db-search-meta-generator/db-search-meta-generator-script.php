<title>Search Meta Table Generator</title>
<?php
$page_type='search_meta_gen';
/*----------------------------------------------------------
Cybertronics Sitemap Generator (Coded by Amish Dotcom)  {Confidential}
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
<h5><center>Start From (Database ID No.): <input type="text" name="start_from"> Upto (Database ID No.): <input type="text" name="finish_upto"></center></h5>
<p><font size="2"><center>Use with Caution!</center></font></p>

<center><input type="submit" name="rct" value="Recreate Table">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="submit" name="submit" value="Generate"></center>
</form>

<?php
// Let this script execute forever if it has to
set_time_limit(0);

if(isset($_POST['rct'])){

header("location:recreate_table.php");

}


if(isset($_POST['submit'])){
$sf = $_POST['start_from'];
$fu = $_POST['finish_upto'];
					if(isset($sf)){
						if(isset($fu)){

//Database Entries Fetcher and Inserter For Album
try
{
		$stmt = $conn->prepare("SELECT id,name,titleType,aka,cast_3_only_without_links,director_without_links,plot_keywords,year FROM $t1 where ID BETWEEN $sf AND $fu", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT))
		{

				//Values Generation and Purification
				
				//For Meta Id (Col. 1)
				$meta_id = 	$row[0];
				
				//For Meta Instant Column (Col. 2)
				include '../../../../includes/functional_engines/title-type_engine.php';
				$meta_instant = "$row[1] ($title_type - $row[7])";

				//For Meta Search Meta Column (Col. 3)
				$meta_name = $row[1];

				//For Meta Type Column (Col. 4)
				$meta_type = $title_type;

				//For Meta Year Column (Col. 5)
				$meta_year = $row[7];

				//For Meta Directed by Column (Col. 6)
				include '../../../../includes/functional_engines/director_engine.php';
				$meta_directed_by = $director_wl;

				//For Meta Cast(3 Only) by Column (Col. 7)
				include '../../../../includes/functional_engines/cast_3_only_engine.php';

				//For Meta Search Meta Column (Col. 8)
				include '../../../../includes/functional_engines/plot-keywords_engine.php';
				include '../../../../includes/functional_engines/aka_engine.php';
				include '../../../../includes/functional_engines/sm_plot-key_aka_joiner_engine.php';

				try {
					$write = $conn->prepare("INSERT IGNORE INTO $t2 (meta_id, meta_instant, meta_name, meta_type, meta_year, meta_directed_by, meta_cast, meta_search_meta) VALUES (:meta_id, :meta_instant, :meta_name, :meta_type, :meta_year, :meta_directed_by, :meta_cast, :meta_search_meta)");
					$write->bindParam(':meta_id', $meta_id);
					$write->bindParam(':meta_instant', $meta_instant);
					$write->bindParam(':meta_name', $meta_name);
					$write->bindParam(':meta_type', $meta_type);
					$write->bindParam(':meta_year', $meta_year);
					$write->bindParam(':meta_directed_by', $meta_directed_by);
					$write->bindParam(':meta_cast', $cast_3o);
					$write->bindParam(':meta_search_meta', $meta_search_meta);
				$write->execute();
				}catch(PDOException $e){echo "Error: " . $e->getMessage();}
		
		}
}catch(PDOException $e){echo "Error: " . $e->getMessage();}

							echo "<br><br><br><br><center><font color=\"red\" size=\"18\" face=\"Arial\">Generated !!</font> (Previous Rows were Ignored if already Existed)</center>";
					}}



}
?>