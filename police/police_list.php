<?php
include 'connection.php';

$query = $connect->prepare("SELECT * FROM police p 
                            JOIN user_details ud 
                            ON p.USER_DETAILS_ID = ud.ID 
                            JOIN police_rank pr
                            ON p.POLICE_RANK_ID = pr.ID");
$query->execute();
$result = $query->fetchAll();

foreach ($result as $key) {

   echo '<option value="'.$key['POLICE_ID'].'">'.$key['ABBR'].'. '. $key['FIRST_NAME'].' '. $key['LAST_NAME'].'</option>';
}



?>