<?php
function get_ver() {

    session_start();

    if(isset($_SESSION["verifaction_c1"])) {
        
        
    } else {
    
    
    
    if(isset($_SESSION["volim"])) {
        $bluep = $_SESSION["bluep"];
        $blue_img = $_SESSION["img_".$bluep];
        $greenp = $_SESSION["greenp"];
        $green_img = $_SESSION["img_".$greenp];
        $purplep = $_SESSION["purplep"];
        $purple_img = $_SESSION["img_".$purplep];
    
        unlink($blue_img);
        unlink($green_img);
        unlink($purple_img);
    
    session_destroy();
    session_start();
    require_once  'bot-protect/backend/index.php';    
   
} else {
    require_once  'bot-protect/backend/index.php';    
    
    
    }
    
       
    
    
    
    $bluep = $_SESSION["bluep"];
        $blue_img = $_SESSION["img_".$bluep];
    $greenp = $_SESSION["greenp"];
        $green_img = $_SESSION["img_".$greenp];
    $purplep = $_SESSION["purplep"];
        $purple_img = $_SESSION["img_".$purplep];
    
        $content = array($blue_img, $green_img, $purple_img);
        shuffle($content);
    
        $realcolor = $realpass["color"];
    
    ?>
    <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MERHABA</title>
    </head>
    <body>
    <?php
    foreach ($content as $v) {
        echo "<img src='$v' alt='HOPPIDI SANA' >";
    }
    ?>
    <h1><?= $realcolor ?> Olanı Seçiniz</h1>
    <form action="bot-protect/backend/verifaction.php" method="post">
        <input type="text" name="content" id="content">
        <button type="submit">Onayla</button>
    </form>
    </body>
    </html>
    <?php
    exit();
    }
}?>
