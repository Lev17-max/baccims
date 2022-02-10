<?php 

include 'connection.php';


if(isset($_POST['id'])){
$id = $_POST['id'];


$query = $connect->prepare("SELECT * FROM `incident` inc 
JOIN item_d itd ON inc.BLOTTER_ENTRY_NUMBER = itd.BLOTTER_ENTRY_NUMBER
JOIN incident_case_disposition icd ON inc.BLOTTER_ENTRY_NUMBER = icd.BLOTTER_ENTRY_NUMBER
WHERE inc.ID = :id");
$query->bindParam(':id', $id);
$query->execute();
$querydata = $query->fetchAll();

echo json_encode($querydata);
// echo 1;

}


// }else if(isset($_POST['blot']) && $count == 2){
// $blotnum = $_POST['blot']);

// $query = $connect->prepare("SELECT * FROM `item_c` WHERE BLOTTER_ENTRY_NO = :id");
// $query->bindParam(':id', $blotnum);
// $query->execute();
// $querydata = $query->fetchAll();

// // echo json_encode($querydata);

// echo 2;
// }





?>