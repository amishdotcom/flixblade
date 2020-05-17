<?php
class thumbnail {
    var $img;


    function __construct($imgfile) {
        //detect image format
        $info = @getimagesize($imgfile);
        if( $info[2] == 2 ) {
            $this->img['format'] = "JPEG";
            $this->img['src'] = @imagecreatefromjpeg( $imgfile );
        } elseif( $info[2] == 3 ) {
            $this->img['format'] = "PNG";
            $this->img['src'] = @imagecreatefrompng( $imgfile );
        } elseif( $info[2] == 1 ) {
            $this->img['format'] = "GIF";
            $this->img['src'] = @imagecreatefromgif( $imgfile );
        } else {
            echo "Not Supported File! Thumbnails can only be made from .jpg, gif and .png images!";
            @unlink( $imgfile );
            exit();
        }
        if( !$this->img['src'] ) {
            echo "Not Supported File! Thumbnails can only be made from .jpg, gif and .png images!";
            @unlink( $imgfile );
            exit();

        }
        $this->img['lebar'] = @imagesx( $this->img['src'] );
        $this->img['tinggi'] = @imagesy( $this->img['src'] );
        $this->img['lebar_thumb'] = $this->img['lebar'];
        $this->img['tinggi_thumb'] = $this->img['tinggi'];
        //default quality jpeg
        $this->img['quality'] = 90;

        //self::__construct();

    }

    function size_auto($size = 100, $site = 0) {
        $size = explode ("x", $size);
        if ( count($size) == 2 ) {
            $size[0] = intval($size[0]);
            $size[1] = intval($size[1]);
            return $this->crop( intval($size[0]), intval($size[1]) );
        } else {
            $size[0] = intval($size[0]);
            return $this->scale( intval($size[0]), $site);
        }
    }
    function crop($nw, $nh) {
        $w = $this->img['lebar'];
        $h = $this->img['tinggi'];
        if( $w <= $nw AND $h <= $nh ) {
            $this->img['lebar_thumb'] = $w;
            $this->img['tinggi_thumb'] = $h;
            return 0;
        }
        $this->img['des'] = imagecreatetruecolor($nw, $nh);
        $wm = $w/$nw;
        $hm = $h/$nh;
        $h_height = $nh/2;
        $w_height = $nw/2;
        if($w> $h) {
            $adjusted_width = $w / $hm;
            $half_width = $adjusted_width / 2;
            $int_width = $half_width - $w_height;
            imagecopyresampled($this->img['des'],$this->img['src'],-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
        } elseif(($w <$h) || ($w == $h)) {
            $adjusted_height = $h / $wm;
            $half_height = $adjusted_height / 2;
            $int_height = $half_height - $h_height;

            imagecopyresampled($this->img['des'],$this->img['src'],0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
        } else {
            imagecopyresampled($this->img['des'],$this->img['src'],0,0,0,0,$nw,$nh,$w,$h);
        }
        $this->img['src'] = $this->img['des'];
        return 1;
    }

    function custom_crop($x,$y,$width,$height) {

        if(($width > 10) && ($height > 10)) {

            $this->img['des'] = imagecreatetruecolor($width,$height);

            imagecopy($this->img['des'], $this->img['src'],0,0,$x,$y,$width,$height);

            //$this->img['src']
        }

        $this->img['src'] = $this->img['des'];

        return 1;
    }

    function scale($size = 100, $site = 0) {
        $site = intval( $site );

        if( $this->img['lebar'] <= $size and $this->img['tinggi'] <= $size ) {
            $this->img['lebar_thumb'] = $this->img['lebar'];
            $this->img['tinggi_thumb'] = $this->img['tinggi'];
            return 0;
        }

        switch ($site) {

            case "1" :
                if( $this->img['lebar'] <= $size ) {
                    $this->img['lebar_thumb'] = $this->img['lebar'];
                    $this->img['tinggi_thumb'] = $this->img['tinggi'];
                    return 0;
                } else {
                    $this->img['lebar_thumb'] = $size;
                    $this->img['tinggi_thumb'] = ($this->img['lebar_thumb'] / $this->img['lebar']) * $this->img['tinggi'];
                }

                break;

            case "2" :
                if( $this->img['tinggi'] <= $size ) {
                    $this->img['lebar_thumb'] = $this->img['lebar'];
                    $this->img['tinggi_thumb'] = $this->img['tinggi'];
                    return 0;
                } else {
                    $this->img['tinggi_thumb'] = $size;
                    $this->img['lebar_thumb'] = ($this->img['tinggi_thumb'] / $this->img['tinggi']) * $this->img['lebar'];
                }

                break;

            default :

                if( $this->img['lebar'] >= $this->img['tinggi'] ) {
                    $this->img['lebar_thumb'] = $size;
                    $this->img['tinggi_thumb'] = ($this->img['lebar_thumb'] / $this->img['lebar']) * $this->img['tinggi'];

                } else {

                    $this->img['tinggi_thumb'] = $size;
                    $this->img['lebar_thumb'] = ($this->img['tinggi_thumb'] / $this->img['tinggi']) * $this->img['lebar'];

                }

                break;
        }

        $this->img['des'] = imagecreatetruecolor( $this->img['lebar_thumb'], $this->img['tinggi_thumb'] );
        @imagecopyresampled( $this->img['des'], $this->img['src'], 0, 0, 0, 0, $this->img['lebar_thumb'], $this->img['tinggi_thumb'], $this->img['lebar'], $this->img['tinggi'] );

        $this->img['src'] = $this->img['des'];
        return 1;
    }

    function jpeg_quality($quality = 90) {
        //jpeg quality
        $this->img['quality'] = $quality;
    }

    function save($save = "") {

        if( $this->img['format'] == "JPG" || $this->img['format'] == "JPEG" ) {
            //JPEG
            imagejpeg( $this->img['src'], $save, $this->img['quality'] );
        } elseif( $this->img['format'] == "PNG" ) {
            //PNG
            imagepng( $this->img['src'], $save );
        } elseif( $this->img['format'] == "GIF" ) {
            //GIF
            imagegif( $this->img['src'], $save );
        }

        imagedestroy( $this->img['src'] );
    }

    function show() {
        if( $this->img['format'] == "JPG" || $this->img['format'] == "JPEG" ) {
            //JPEG
            imageJPEG( $this->img['src'], "", $this->img['quality'] );
        } elseif( $this->img['format'] == "PNG" ) {
            //PNG
            imagePNG( $this->img['src'] );
        } elseif( $this->img['format'] == "GIF" ) {
            //GIF
            imageGIF( $this->img['src'] );
        }

        imagedestroy( $this->img['src'] );
    }

}
?>