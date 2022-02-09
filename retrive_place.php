<?php include 'connection.php';

$purok = $connect->prepare('SELECT * FROM `purok`');
$purok->execute();
$data2 = $purok->fetchAll();
$phase = $connect->prepare('SELECT * FROM `phase`');
$phase->execute();
$data1 = $phase->fetchAll();
$brgy = $connect->prepare('SELECT * FROM `barangay`');
$brgy->execute();
$data3 = $brgy->fetchAll();

?>