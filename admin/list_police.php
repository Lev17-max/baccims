<?php

include 'connection.php';

$query= $connect->prepare("SELECT * FROM `police_rank`");
$query->execute();
$policelist=$query->fetchAll();


foreach ($policelist as $list) {
    echo '<option value="'.$list['ID'].'">'.$list['NAME'].'</option>';
    }

?>