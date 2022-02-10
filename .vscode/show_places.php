<?php include 'connection.php';

$query = $connect->prepare('SELECT *,P.ID AS PLACE_ID FROM `place` P LEFT JOIN (SELECT * FROM phase) PH ON PH.ID = P.PHASE_ID LEFT JOIN (SELECT * FROM purok) PR ON PR.ID = P.PUROK_ID LEFT JOIN (SELECT * FROM barangay) B ON B.ID = P.BARANGAY_ID;');
$query->execute();
$data = $query->fetchAll();
echo ' <option value="" selected disabled>Phase & Purok</option>
<option value="-1" data-toggle="modal" role="button">Add Place</option>';
foreach ($data as $datas) {
echo ' <option value="'.$datas['PLACE_ID'].'">'.$datas['PHASE'].' '.$datas['PUROK'].' '.$datas['BARANGAY'].'</option>';
// code...
}


?>