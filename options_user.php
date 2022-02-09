<?php 

 include 'connection.php';
$id = $_POST['id'];

$query = $connect->prepare("SELECT * FROM user U JOIN (SELECT * FROM user_details) UD ON UD.ID = U.USER_DETAILS_ID WHERE U.ID=:ID
 ");
$query->bindParam(':ID', $id);
$query->execute();
$data = $query->fetchAll();
if ($query) {
    foreach ($data as $value) {
        echo $value['ID'] . '|'. $value['ACCESS_LEVEL'] . '|' . $value['STATUS'] . '|' . $value['VERIFIED'].'|'.$value['FIRST_NAME'];
    }
}



 ?>

