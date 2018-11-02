<?php 
// var_dump($_POST); exit;
$imgFile = __DIR__ . '/image.png';
    if (!file_exists($imgFile)) {
        echo "Файл с картинкой не найден";
        exit;
    }
  
$img = ImageCreateFromPNG($imgFile);
 
$color = imagecolorallocate($img, 255, 0, 0);

$font = __DIR__ . '/arial.ttf';

$text = $_POST['name'] . ', ваша оценка'; 
imagettftext($img, 24, 0, 100, 159, $color, $font, $text);

header('Content-type: image/png');
imagepng($img);
?>

