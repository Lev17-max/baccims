<?php
include 'connection.php';

$from = $_POST['from'];
$to = $_POST['to'];


$query = $connect->prepare("SELECT *,count(MONTH(DATETIME_FILED)) AS TOTAL,MONTH(DATETIME_FILED) AS MONTHS FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo GROUP BY MONTH(DATETIME_FILED)");
$query->bindParam(':dateTo', $to);
$query->bindParam(':dateFrom', $from);
$query->execute();
$queryArray = $query->fetchAll();

echo json_encode($queryArray);

// $count = 1;
// if (!empty($queryArray)) {
//     foreach ($queryArray as $key) {

//         $dateArray[] = Date('m', strtotime($key[2]));
//     }
//     $DateArray = array_count_values($dateArray);
//     while ($count < 13) {
//         foreach ($DateArray as $key => $value) {
//             if ($count == $key) {
//                 $totalCrimes[] = $value;
//             } else {
//                 $totalCrimes[] =  0;
//             }
//             $count++;
//         }
//     }

//     // echo implode(',', $array);
//     echo json_encode($totalCrimes);
// } else {
//     while ($count < 13) {

//         $totalCrimes[] =  0;

//         $count++;
//     }

//     // echo implode(',', $array);
//     echo json_encode($totalCrimes);
// }
