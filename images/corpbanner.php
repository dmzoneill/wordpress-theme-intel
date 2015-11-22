<?php

// @author David O Neill < david.m.oneill@intel.com >
//

function check_size( $size )
{
  switch( strtolower( $size ) )
  {
    case "small": return "small"; break;
    case "medium": return "medium"; break;
    case "large": return "large"; break;
    default: return "large"; break;
  }
}

$title = isset( $_GET[ 'title' ] ) ? $_GET[ 'title' ] : "Corporate Services";
$slug = isset( $_GET[ 'slug' ] ) ? $_GET[ 'slug' ] : "Creating a better tomorrow for Intel";
$width = isset( $_GET[ 'width' ] ) ? $_GET[ 'width' ] : 850;
$size = isset( $_GET[ 'size' ] ) ? check_size( $_GET[ 'size' ] ) : "large";

$title_font = "IntelClear_Rg.ttf";
$slug_font = "IntelClear_Bd.ttf";
$angle = 0;

$sizes = array();
$sizes[ 'large' ] = array();
$sizes[ 'large' ][ 'width' ] = 850;
$sizes[ 'large' ][ 'height' ] = 100;
$sizes[ 'large' ][ 'logo' ] = "intel-header-blue-120.png";
$sizes[ 'large' ][ 'logo_left' ] = 10;
$sizes[ 'large' ][ 'logo_top' ] = 20;
$sizes[ 'large' ][ 'logo_width' ] = 120;
$sizes[ 'large' ][ 'logo_height' ] = 60;
$sizes[ 'large' ][ 'peel' ] = "peel_top_right-dark-100.png";
$sizes[ 'large' ][ 'peel_width' ] = 100;
$sizes[ 'large' ][ 'peel_height' ] = 83;
$sizes[ 'large' ][ 'title_y' ] = 62;
$sizes[ 'large' ][ 'title_x' ] = 140;
$sizes[ 'large' ][ 'title_y_slug' ] = 52;
$sizes[ 'large' ][ 'slug_y' ] = 72;
$sizes[ 'large' ][ 'slug_x' ] = 150;
$sizes[ 'large' ][ 'title_font_size' ] = 24;
$sizes[ 'large' ][ 'slug_font_size' ] = 10;

$sizes[ 'medium' ] = array();
$sizes[ 'medium' ][ 'width' ] = 850;
$sizes[ 'medium' ][ 'height' ] = 85;
$sizes[ 'medium' ][ 'logo' ] = "intel-header-blue-100.png";
$sizes[ 'medium' ][ 'logo_left' ] = 10;
$sizes[ 'medium' ][ 'logo_top' ] = 18;
$sizes[ 'medium' ][ 'logo_width' ] = 100;
$sizes[ 'medium' ][ 'logo_height' ] = 50;
$sizes[ 'medium' ][ 'peel' ] = "peel_top_right-dark-80.png";
$sizes[ 'medium' ][ 'peel_width' ] = 80;
$sizes[ 'medium' ][ 'peel_height' ] = 66;
$sizes[ 'medium' ][ 'title_y' ] = 52;
$sizes[ 'medium' ][ 'title_x' ] = 120;
$sizes[ 'medium' ][ 'title_y_slug' ] = 46;
$sizes[ 'medium' ][ 'slug_y' ] = 64;
$sizes[ 'medium' ][ 'slug_x' ] = 125;
$sizes[ 'medium' ][ 'title_font_size' ] = 20;
$sizes[ 'medium' ][ 'slug_font_size' ] = 9;

$sizes[ 'small' ] = array();
$sizes[ 'small' ][ 'width' ] = 850;
$sizes[ 'small' ][ 'height' ] = 70;
$sizes[ 'small' ][ 'logo' ] = "intel-header-blue-80.png";
$sizes[ 'small' ][ 'logo_left' ] = 10;
$sizes[ 'small' ][ 'logo_top' ] = 16;
$sizes[ 'small' ][ 'logo_width' ] = 80;
$sizes[ 'small' ][ 'logo_height' ] = 40;
$sizes[ 'small' ][ 'peel' ] = "peel_top_right-dark-60.png";
$sizes[ 'small' ][ 'peel_width' ] = 60;
$sizes[ 'small' ][ 'peel_height' ] = 50;
$sizes[ 'small' ][ 'title_y' ] = 42;
$sizes[ 'small' ][ 'title_x' ] = 100;
$sizes[ 'small' ][ 'title_y_slug' ] = 35;
$sizes[ 'small' ][ 'slug_y' ] = 51;
$sizes[ 'small' ][ 'slug_x' ] = 105;
$sizes[ 'small' ][ 'title_font_size' ] = 16;
$sizes[ 'small' ][ 'slug_font_size' ] = 8;


$logo = imagecreatefrompng( $sizes[ $size ][ 'logo' ] ); 
imagealphablending( $logo, true );

$peel = imagecreatefrompng( $sizes[ $size ][ 'peel' ] );
imagealphablending( $peel, true );

$title_y = $slug == "false" ? $sizes[ $size ][ 'title_y' ] : $sizes[ $size ][ 'title_y_slug' ];

$banner = imagecreatetruecolor( $width, $sizes[ $size ][ 'height' ] ); 
imagealphablending( $banner, true );

$white = imagecolorallocate( $banner, 255, 255, 255 );
$blue = imagecolorallocate( $banner, 0, 113, 197 );

imagefill( $banner, 0, 0, $blue );
imagecopyresampled( $banner, $peel, $width - $sizes[ $size ][ 'peel_width' ], 0, 0, 0, $sizes[ $size ][ 'peel_width' ], $sizes[ $size ][ 'peel_height' ], $sizes[ $size ][ 'peel_width' ], $sizes[ $size ][ 'peel_height' ] );
imagecopyresampled( $banner, $logo, $sizes[ $size ][ 'logo_left' ], $sizes[ $size ][ 'logo_top' ], 0, 0, $sizes[ $size ][ 'logo_width' ], $sizes[ $size ][ 'logo_height' ], $sizes[ $size ][ 'logo_width' ], $sizes[ $size ][ 'logo_height' ] );
Imagettftext( $banner, $sizes[ $size ][ 'title_font_size' ], $angle, $sizes[ $size ][ 'title_x' ], $title_y, $white, $title_font, $title );

if( $slug != "false" )
{
  Imagettftext( $banner, $sizes[ $size ][ 'slug_font_size' ], $angle, $sizes[ $size ][ 'slug_x' ], $sizes[ $size ][ 'slug_y' ], $white, $slug_font, $slug );
}
 
header( 'Content-Type: image/png' );

imagepng( $banner );
imagedestroy( $banner );