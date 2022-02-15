<?php 

include 'connection.php'; 
$id = $_POST['id'];
$status = $_POST['stats'];

$query = $connect->prepare("UPDATE `info_board` SET `STATUS` = :stats WHERE ID = :id");
$query->bindParam(':id',$id);
$query->bindParam(':stats',$status);
$query->execute();


if($query){
    echo 1;
}else{
    echo 2;
}

?>

