<?php 

include 'connection.php';

$id = $_POST['id'];

$query = $connect->prepare('SELECT STATUS,BLOTTER_ENTRY_NUMBER FROM `incident` WHERE ID = :id');
$query->bindParam(':id', $id);
$query->execute();
$querydata=$query->fetchAll();

echo json_encode($querydata);



?>