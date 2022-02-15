<?php
ob_start();
session_start();




if (!isset($_SESSION['USERNAME'])) {
    unset($_SESSION['USERNAME'],$_SESSION['GENDER'], $_SESSION['USER_ID'], $_SESSION['STATUS'],$_SESSION['VERIFIED'], $_SESSION['ACCESS_LEVEL'], $_SESSION['last_login_timestamp']);
    header("location:../index.php?unauthorized");
} else {
    $name = $_SESSION['USERNAME'];
    $icon = $_SESSION['ICON']; 
    $id = $_SESSION['USER_ID'];
    $access_level = $_SESSION['ACCESS_LEVEL'];
    if($access_level == 1){
        $levelLabel = 'Police';
    } else if($access_level == 2){
        $levelLabel = 'Barangay Official';
    }else if($access_level == 3){
        $levelLabel = 'Admin';
    }else if($access_level == 0){
        $levelLabel = 'Resident';
    }
   
}


?>