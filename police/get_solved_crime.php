<?php
include 'connection.php';


// $from = $_POST['from'];
// $to = $_POST['to'];


$from = 2013;
$to = 2022;

$yearsDataSolved = $connect->prepare("SELECT DISTINCT year(DATETIME_FILED) FROM `incident`WHERE year(DATETIME_FILED) 
                                        BETWEEN :dateFrom AND :dateTo AND STATUS=1 ORDER by year(DATETIME_FILED)");
$yearsDataSolved->bindParam(':dateTo' ,$to);
$yearsDataSolved->bindParam(':dateFrom' ,$from);
$yearsDataSolved->execute();
$yearsListDataSolved = $yearsDataSolved->fetchAll();

echo json_encode($yearsListDataSolved);

// $yearsData = $connect->prepare("SELECT year(DATETIME_FILED),STATUS FROM `incident` where 
// year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo ORDER by year(DATETIME_FILED)");
// $yearsData->bindParam(':dateTo' ,$to);
// $yearsData->bindParam(':dateFrom' ,$from);
// $yearsData->execute();
// $yearsListData = $yearsData->fetchAll();



// foreach ($yearsListData as $key) {

//     // $yearsL[] = Date('Y' ,strtotime($key[0]));
//     $listofyear[] = $key[0];
//     // echo $key[1];
// }
// foreach ($yearsListDataSolved as $key) {
//     $listofyearsolved[] = $key[0];
//     # code...

// }



// // echo implode(',', $yearsL1);

// $listofyearindex = array_count_values($listofyear);


// if(empty($listofyearsolved)) {

// }else{
//     $listofyearindexsolved = array_count_values($listofyearsolved);
  
// }


// foreach ($listofyearindex as $filed => $val1) {
//     if (empty($listofyearsolved)) {
//                 $formula = (0 / $val1) * 100;
//                 $solution[] = array($filed, $formula);
//      }else{
//         foreach ($listofyearindexsolved as $solved => $val2) {
//             if($solved != $filed){
//                 $formula = (0 / $val1) * 100;
//                 $solution[] = array($filed, $formula);
//                 echo $filed.'-'.$solved.': '. $val1 . 0 .'<br>';
           
                
//             }else{
//                 $formula = ($val2 / $val1) * 100;
//                 $solution[] = array($filed, $formula);
//                 echo $filed.'-'.$solved.': '. $val1 . $val2 .'<br>';
                
//                 }
//           break;
//          }

//      }
// }



// foreach ($listofyearindex as $filed => $val1) {
//     if (empty($listofyearsolved)) {
//         $formula = (0 / $val1) * 100;
//         $solution[] = array($filed, $formula);
//     }else{
//     foreach ($listofyearindexsolved as $solved => $val2) {
//              if($solved != $filed){

//                 $formula = (0 / $val1) * 100;
//                 $solution[] = array($filed, $formula);
//                 echo $filed.'-'.$solved.': '. $val1 . 0 .'<br>';
              
//             } else if($solved < $filed){
//                  continue;
//             }else{
                
//                 $formula = ($val2 / $val1) * 100;
//                 $solution[] = array($filed, $formula);

//                 echo $filed.'-'.$solved.': '. $val1 . $val2 .'<br>';
//              }

         
//         }
          
        
//     }
// }

// $solution = array_unique($solution, SORT_NUMERIC);

// print_r($solution);

// echo json_encode($solution);
// echo array_unique($solution);
// array_unique(print_r($solution));
// print_r($solution);

// echo json_encode($solution);

?>