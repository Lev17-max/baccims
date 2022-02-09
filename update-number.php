<?php  

include 'connection.php';
$usid = $_POST['id'];
$pnum = $_POST['phone'];

$query = $connect->prepare("UPDATE `user_details` SET `PHONE`= :phone WHERE id = :id");
$query ->bindParam(':id', $usid);
$query->bindParam(':phone', $pnum);
$query->execute();
$queryres = $query->rowCount();

if($queryres <= 0){
 echo 404;
}else{
 echo 204;
}


?>