<?php 

include 'connection.php';

$from = $_POST['from'];
$to = $_POST['to'];

$solvedlast = $connect->prepare("SELECT *,count(MONTH(DATETIME_FILED)) AS TOTAL,MONTH(DATETIME_FILED) AS MONTHS FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo  AND STATUS = 1 GROUP BY MONTH(DATETIME_FILED)");
$solvedlast->bindParam(':dateTo' ,$to);
$solvedlast->bindParam(':dateFrom' ,$from);
$solvedlast->execute();
$solvedlastData = $solvedlast->fetchAll();

echo json_encode($solvedlastData);


// $count4 = 1;
// if (!empty($solvedlastData)) {
// foreach ($solvedlastData as $key) {

//     $solve2[] = Date('m', strtotime($key[2]));
// }
// $solvearr = array_count_values($solve2);

// while ($count4 < 13) {
//     foreach ($solvearr as $key => $value) {
//         if ($count4 == $key) {
//             $uparray4[] = $value;
//         } else {
//             $uparray4[] =  0;
//         }
//         $count4++;
//     }
// }
// // echo implode(',', $array4);
// echo json_encode($uparray4);
// } else {
// $count4 = 1;
// while ($count4 < 13) {

//     $uparray4[] =  0;

//     $count4++;
// }
// echo json_encode($uparray4);

// }

?>
