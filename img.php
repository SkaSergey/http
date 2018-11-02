<?php 
// var_dump($_POST); exit;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$json = file_get_contents(__DIR__ . '/uploads/' . $id);
$test = json_decode($json, true);

$i=0;
$answers = 0;
$all = 0;
if (!empty($_POST)) {
    foreach ($_POST as $q => $a) {
        $all++;
        if ($i <= count($test['1'])-1) {
            if ($a == $test['1']["$i"]['0']) {
                $answers++; 
            }
        $i++;
        }
    }    
}
$rate = $answers . ' из ' . $i;

$imgFile = __DIR__ . '/image.png';
    if (!file_exists($imgFile)) {
        echo "Файл с картинкой не найден";
        exit;
    }
  
$img = ImageCreateFromPNG($imgFile);
 
$color = imagecolorallocate($img, 255, 0, 0);

$font = __DIR__ . '/arial.ttf';

$name = $_POST['name'] . '!';
$text = 'Ваша оценка' ; 
imagettftext($img, 24, 0, 170, 130, $color, $font, $name);
imagettftext($img, 24, 0, 110, 160, $color, $font, $text);
imagettftext($img, 24, 0, 170, 190, $color, $font, $rate);
header('Content-type: image/png');
imagepng($img);
?>
