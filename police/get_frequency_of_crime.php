<?php 

include 'connection.php';

$from = $_POST['from'];
$to = $_POST['to'];
$id = $_POST['id'];

$frequency = $connect->prepare("SELECT count(TYPE_OF_INCIDENT_ID) AS TOTAL FROM `incident` where DATETIME_FILED 
BETWEEN :dateFrom AND :dateTo AND TYPE_OF_INCIDENT_ID = :id");

$frequency->bindParam(':dateTo' ,$to);
$frequency->bindParam(':dateFrom' ,$from);
$frequency->bindParam(':id' ,$id);
$frequency->execute();
$frequencyData = $frequency->fetchAll();


echo json_encode($frequencyData);



?>
