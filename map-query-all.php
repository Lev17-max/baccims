<?php
include 'connection.php';


$crimequery  = $connect->prepare('SELECT *,COUNT(PLACE_ID) AS TOTAL FROM item_d i 
                               JOIN place p
                                    ON i.PLACE_ID = p.id
                                    JOIN phase ph
                                    ON p.PHASE_ID = ph.ID
                                    JOIN purok pr 
                                    ON p.PUROK_ID = pr.ID
                                    JOIN incident inc 
                                    ON i.BLOTTER_ENTRY_NUMBER = inc.BLOTTER_ENTRY_NUMBER
                                    JOIN incident_type inct
                                    ON inc.TYPE_OF_INCIDENT_ID = inct.ID
                                GROUP BY PLACE_ID,inc.TYPE_OF_INCIDENT_ID');

$crimequery->execute();
$crimequerydata = $crimequery->fetchAll();

echo json_encode($crimequerydata);




?>
