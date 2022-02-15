<?php
include 'connection.php';


if(isset($_POST['year']) && !isset($_POST['id'])){
 $year = $_POST['year'];
$crimequery2  = $connect->prepare('SELECT *,COUNT(TOTAL) AS TOTAL_CRIMES FROM
                                    (SELECT LATITUDE,LONGITUDE,ICON,PLACE_ID,PHASE,PUROK,DATETIME_FILED,count(inc.TYPE_OF_INCIDENT_ID) AS TOTAL FROM item_d i 
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
                                    WHERE YEAR(DATETIME_FILED) = :year

                                    GROUP BY inc.TYPE_OF_INCIDENT_ID,i.PLACE_ID) as TBLA
                                    GROUP BY PLACE_ID');
$crimequery2->bindParam(':year', $year);
$crimequery2->execute();
$crimequerydata2 = $crimequery2->fetchAll();

echo json_encode($crimequerydata2);
}else if(isset($_POST['year']) && isset($_POST['id'])){

    $year = $_POST['year'];
    $id = $_POST['id'];
    $crimequery2  = $connect->prepare('SELECT *,COUNT(TOTAL) AS TOTAL_CRIMES FROM
                                        (SELECT LATITUDE,LONGITUDE,ICON,PLACE_ID,PHASE,PUROK,DATETIME_FILED,count(inc.TYPE_OF_INCIDENT_ID) AS TOTAL FROM item_d i 
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
                                        WHERE YEAR(DATETIME_FILED) = :year AND inc.TYPE_OF_INCIDENT_ID = :id

                                        GROUP BY inc.TYPE_OF_INCIDENT_ID,i.PLACE_ID) as TBLA
                                        GROUP BY PLACE_ID');

                                        
    $crimequery2->bindParam(':year', $year);
    $crimequery2->bindParam(':id', $id);
    $crimequery2->execute();
    $crimequerydata2 = $crimequery2->fetchAll();
    
    echo json_encode($crimequerydata2);



}



// $year = 2021;





?>
