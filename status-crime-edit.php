<?php 
include 'connection.php';

if(isset($_POST['id']) && isset($_POST['status'])){
    $idcrime = $_POST['id'];
    $status = $_POST['status'];

    $query = $connect->prepare('UPDATE `incident` SET `STATUS`=:status WHERE ID=:id');
    $query->bindParam(':id', $idcrime);
    $query->bindParam(':status', $status);
    $query->execute();
    
    if($query){
        echo 204;
    }else{
        echo 504;
    }
}

?>