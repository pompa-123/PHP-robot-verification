<?php

if (isset($_SESSION["volim"])) {
   if($_SESSION["volim"] == true) {
    echo "ZATEN BIR RESIM OLUŞTURULDU";
    exit();
   }
}


function randomPassword($length = 32) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }
    
    return $password;
}

function createimage($number,$link){
$counter = 0;

$image = imagecreatefromjpeg($link); // Resmin yolunu belirtin
// İlk olarak, kullanılacak resmi yükleyin
// Resmin yeni boyutlarını belirleyin
$newWidth = 200; // Yeni genişlik
$newHeight = 40; // Yeni yükseklik

// Yeni boyutlara uygun olarak resmi yeniden boyutlandırın
$newImage = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($image), imagesy($image));

// Yazı rengi ve yazı tipini ayarlayın
$fontColor = imagecolorallocate($newImage, 255, 255, 255); // Beyaz renk
$font = 'bot-protect/assets/font/arial.ttf'; // Kullanmak istediğiniz yazı tipinin yolunu belirtin

// Yazıyı resmin üzerine ekleyin
$text = randomPassword(8);
imagettftext($newImage, 20, 0, 10, 30, $fontColor, $font, $text);
$newwimage = 'bot-protect/assets/img/ver/'.randomPassword(16).".jpg";
// Oluşturulan resmi kaydedin
$resim = imagejpeg($newImage, $newwimage); // Kaydetmek istediğiniz dosya adını belirtin
imagedestroy($newImage); // Belleği temizle
$sessionimg = "img_".$number;
$_SESSION[$sessionimg] = $newwimage;
return $text;
}
$number1 = randomPassword(4);
    $s1 = createimage($number1,"bot-protect/assets/img/blue.jpg");
        $_SESSION["blue"] = $s1;
        $_SESSION["bluep"] = $number1;
$number2 = randomPassword(4);
    $s2 = createimage($number2,"bot-protect/assets/img/green.jpg");
        $_SESSION["green"] = $s2;
        $_SESSION["greenp"] = $number2;

$number3 = randomPassword(4);
    $s3 = createimage($number3,"bot-protect/assets/img/purple.jpg");
        $_SESSION["purple"] = $s3;
        $_SESSION["purplep"] = $number3;

        $s1_array = array("color" => "blue","pass" => $s1);
        $s2_array = array("color" => "green","pass" => $s2);
        $s3_array = array("color" => "purple","pass" => $s3);

        $text_content = array($s1_array, $s2_array, $s3_array);
        shuffle($text_content);
        $realpass = array_shift($text_content);
        $_SESSION["realpass"] = $realpass; 

$_SESSION["volim"] = true;






?>