<?php

//For Complete CDN size
    $path = "../../../../cybertronics.org.in/public_html/cdn/flixblade/";
    $sizeInBytes = getFolderSize($path);

//For Images only size
    $path_2 = "../../../../cybertronics.org.in/public_html/cdn/flixblade/media/images/";
    $sizeInBytes_2 = getFolderSize($path_2);


//For Thumbnails only size
    $path_3 = "../../../../cybertronics.org.in/public_html/cdn/flixblade/media/thumbs/";
    $sizeInBytes_3 = getFolderSize($path_3);


    function getFolderSize($directory){
        $totalSize = 0;
        $directoryArray = scandir($directory);

        foreach($directoryArray as $key => $fileName){
            if($fileName != ".." && $fileName != "."){
                if(is_dir($directory . "/" . $fileName)){
                    $totalSize = $totalSize + getFolderSize($directory . "/" . $fileName);
                } else if(is_file($directory . "/". $fileName)){
                    $totalSize = $totalSize + filesize($directory. "/". $fileName);
                }
            }
        }
        return $totalSize;
    }


    function getFormattedSize($sizeInBytes) {

        if($sizeInBytes < 1024) {
            return $sizeInBytes . " bytes";
        } else if($sizeInBytes < 1024*1024) {
            return $sizeInBytes/1024 . " KB";
        } else if($sizeInBytes < 1024*1024*1024) {
            return $sizeInBytes/(1024*1024) . " MB";
        } else if($sizeInBytes < 1024*1024*1024*1024) {
            return $sizeInBytes/(1024*1024*1024) . " GB";
        } else if($sizeInBytes < 1024*1024*1024*1024*1024) {
            return $sizeInBytes/(1024*1024*1024*1024) . " TB";
        } else {
            return "Greater than 1024 TB";
        }

    }


    function getunFormattedSize($sizeInBytes) {

        if($sizeInBytes > 1024) {
            return $sizeInBytes/(1024*1024);
        }
    }

?>