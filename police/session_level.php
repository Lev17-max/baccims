<?php 
$user_type = 'dummy';
$head = ' <section class="content"> <div class="container ">';
$foot = '<div></section>';

if (isset($_SESSION['USERNAME'])) {

    if ($_SESSION['ACCESS_LEVEL'] == 1) {

        $user_type = 'Police';
        include 'sidebar_police.php';
        include 'police_home.php';
    }
} else {
unset($_SESSION['USERNAME'],$_SESSION['GENDER'], $_SESSION['USER_ID'],$_SESSION['VERIFIED'], $_SESSION['STATUS'], $_SESSION['ACCESS_LEVEL'], $_SESSION['LAST_VISITED']);
header("location:logout.php");
}

?>