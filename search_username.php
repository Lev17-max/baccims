<?php  

include 'connection.php';

if(isset($_POST['username'])){

    $uname = $_POST['username'];
    $encuname = md5($uname);

    $query = $connect -> prepare('SELECT * FROM user WHERE USERNAME = :uname');
    $query->bindParam(':uname', $encuname);
    $query->execute();
    $username = $query->rowcount();

    if($username <= 0){
    echo 404;
    }else{
    echo 204;
    }
}



?>