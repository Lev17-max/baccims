<?php

include 'connection.php'; 

if(isset($_POST['currpass']) && isset($_POST['id'])){
    $currpass = md5( $_POST['currpass'] );
    $uidnew = $_POST['id'];

    $query = $connect->prepare('SELECT PASSWORD FROM `user` WHERE ID=:id AND PASSWORD = :pass');
    $query->bindParam(':id', $uidnew);
    $query->bindParam(':pass' , $currpass);
    $query->execute();
    $numresults = $query->rowCount();
    echo json_encode($numresults);

}
else{
    header('location:404-page.php');
}



?>