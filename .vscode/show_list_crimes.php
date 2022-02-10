<?php 


include 'connection.php';

    $listallincident = $connect->prepare("SELECT * from incident i
    LEFT JOIN incident_type inc ON i.TYPE_OF_INCIDENT_ID = inc.ID
    LEFT JOIN item_a ia ON i.BLOTTER_ENTRY_NUMBER = ia.BLOTTER_ENTRY_NO
    LEFT JOIN item_d id ON i.BLOTTER_ENTRY_NUMBER = id.BLOTTER_ENTRY_NUMBER
    LEFT JOIN place p ON id.PLACE_ID = p.ID
    LEFT JOIN phase ph ON p.PHASE_ID= ph.ID
    LEFT JOIN purok pr ON p.PUROK_ID= pr.ID
    LEFT JOIN barangay b  ON p.BARANGAY_ID = b.ID
");


$listallincident->execute();
$allcrimedatas = $listallincident->fetchAll();




?>