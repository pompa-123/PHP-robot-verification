<?php

if (isset($_POST["content"])) {
    if(empty($_POST["content"])) {
        echo "boş";
        exit();
    }
    session_start();
    if (isset($_SESSION["verifaction_c1"])) {
        if ($_SESSION["verifaction_c1"] == true) {
           echo "zaten doğrulandın!";
           exit();
        }
        exit();
    }

    $realsession = $_SESSION["realpass"];
    $realpass = $realsession["pass"];
    $cpass = $_POST["content"];
    if ($cpass == $realpass) {
        session_destroy();
        session_start();
        $_SESSION["verifaction_c1"] = true;
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]."?error=wrongpass");
    }
    
}