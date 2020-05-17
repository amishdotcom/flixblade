<title>Image Thumbnails Generator</title>
<?php
//Global Includes
echo "<font color=\"red\" size=\"18\" face=\"Arial\">Cybertronics Image Thumbnails Generator</font>";echo "<font color=\"black\"></font><font color=\"green\">An Amish Dotcom Exclusive</font>";echo "<font color=\"green\">   (Confidential Tool) (For flixblade)</font>";
echo "<br \>";
echo "<br \>";
echo "<br \>";
include '../../../switches/cdn.php';
require('../access.php');
include '../../../switches/db.php';



//Maximize script execution time
ini_set('max_execution_time', 0);
// Let this script execute forever if it has to
set_time_limit(0);

//Initial settings, Just specify Source and Destination Image folder.
$ImagesDirectory	= "../../../../cybertronics.org.in/public_html/cdn/flixblade/media/tmp/images/"; //Source Image Directory End with Slash
$DestImagesDirectory	= "../../../../cybertronics.org.in/public_html/cdn/flixblade/media/tmp/thumbs/"; //Destination Image Directory End with Slash
//Change Width & Height on Lines No. 54 & 72 both & Below(Here)
$NewImageWidth 		= 258; //New Width of Image
$NewImageHeight 	= 280; // New Height of Image
$Quality 		= 80; //Image Quality

//Open Source Image directory, loop through each Image and resize it.
if($dir = opendir($ImagesDirectory)){
	while(($file = readdir($dir))!== false){

		$imagePath = $ImagesDirectory.$file;
		$destPath = $DestImagesDirectory.$file;
		$checkValidImage = @getimagesize($imagePath);

		if(file_exists($imagePath) && $checkValidImage) //Continue only if 2 given parameters are true
		{
			//Image looks valid, resize.
			if(resizeImage($imagePath,$destPath,$NewImageWidth,$NewImageHeight,$Quality))
			{
				/*
				Blanked
				*/

			}else{
				/*
				Blanked
				*/
			}
		}
	}
	closedir($dir);
}

//Function that resizes image.
function resizeImage($SrcImage,$DestImage, $MaxWidth,$MaxHeight,$Quality)
{
   	list($iWidth,$iHeight,$type)	= getimagesize($SrcImage);
    $NewCanves             	= imagecreatetruecolor(258, 280);

	switch(strtolower(image_type_to_mime_type($type)))
	{
		case 'image/jpeg':
			$NewImage = imagecreatefromjpeg($SrcImage);
			break;
		case 'image/png':
			$NewImage = imagecreatefrompng($SrcImage);
			break;
		case 'image/gif':
			$NewImage = imagecreatefromgif($SrcImage);
			break;
		default:
			return false;
	}

	// Resize Image
    if(imagecopyresampled($NewCanves, $NewImage,0, 0, 0, 0, 258, 280, $iWidth, $iHeight))
    {
        // copy file
        if(imagejpeg($NewCanves,$DestImage,$Quality))
        {
            imagedestroy($NewCanves);
            return true;
        }
    }
}

//Counting the Total Number of Images Resized

// Returns array of files
$files = scandir($ImagesDirectory);
// Count number of files and store them to variable..
$num_files = count($files)-2;


	echo "<br><br><br><br><br><br><br><br>Total Images Resized : <font color=\"red\" face=\"Arial\">$num_files</font><br>Files written in 'thumbs' folder.";			

include '../../includes/conn_close.php';

echo"<br><br><br><br><br><br>";
// Script Execution Time
usleep(mt_rand(100, 10000));
// At the end of your script
$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
echo "<b>Total Execution Time :</b> $time seconds\n";


?>