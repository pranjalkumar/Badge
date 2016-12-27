
<?php

$f = array_keys($_POST) ;$url = $_POST['url'];
$oh=$_POST['oe'];
$gda=$_POST['__gda__'];
$s = $s.$url."&oe=".$oh."&__gda__=".$gda;
$name = $_POST['id'];


$s =  substr($s,8);



if (file_exists("upload.jpg"))
{unlink("upload.jpg");}
$n = $name.'.jpg';
$s = "http://".$s;
echo $s;
$st = file_get_contents($s);

file_put_contents($n, $st);	
$bg = imagecreatefromjpeg($n);
$img = imagecreatefrompng('badge.png');
header('Content-Type: image/jpeg');
imagejpeg($img);

imagepng($img);
$size=getimagesize($n);
//imagecopymerge( $bg,$img, 0, 0, 0, 0, imagesx($img), imagesy($img), 100);
imagecopy( $bg,$img, $size[0]-180, $size[1]-180, 0, 0, imagesx($img), imagesy($img));

imagejpeg($bg, $n);
echo $s;

?>

