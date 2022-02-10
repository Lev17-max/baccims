<?php
include 'connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

if (isset($username) && isset($password)) {
  
$encryptedPass = md5($password);
$usernameenc = md5($username); 


$search = $connect->prepare("SELECT * FROM `user` WHERE USERNAME=:username");
$search->bindParam(':username', $usernameenc);
$search->execute();
$result = $search->fetchAll();

foreach ($result as $key => $value) {
       $id = $value['ID'];
}


if(count($result) <= 0){
    header("location:forgot-password.php?notfoundpass");
}else{
$query = $connect->prepare("UPDATE `user` SET `USERNAME`=:username,`PASSWORD`=:pass WHERE ID = :sesid");
$query->bindParam(':sesid', $id);
$query->bindParam(':username', $usernameenc);
$query->bindParam(':pass', $encryptedPass);

$query->execute();
if ($query) {
    header("location:index.php?passreset");
} else {
    header("location:forgot-password.php?passerror");
}
}






}else{

}



?>