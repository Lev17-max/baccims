<?php
include 'connection.php';


$incident = $_POST['id'];

$query = $connect->prepare('SELECT *,count(inc.TYPE_OF_INCIDENT_ID) AS TOTAL FROM item_d i 
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
                            WHERE inc.TYPE_OF_INCIDENT_ID = :id
                            GROUP BY inc.TYPE_OF_INCIDENT_ID,i.PLACE_ID');

$query->bindParam(':id', $incident);
$query->execute();
$queryData = $query->fetchAll();



echo json_encode($queryData);



?>