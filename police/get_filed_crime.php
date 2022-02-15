<?php
include 'connection.php';

$from = $_POST['from'];
$to = $_POST['to'];


// $from = 2013;
// $to = 2022;
// $yearsDataSolved = $connect->prepare("SELECT DISTINCT year(DATETIME_FILED) FROM `incident`WHERE year(DATETIME_FILED) 
//                                         BETWEEN :dateFrom AND :dateTo AND STATUS=1 ORDER by year(DATETIME_FILED)");
// $yearsDataSolved->bindParam(':dateTo' ,$to);
// $yearsDataSolved->bindParam(':dateFrom' ,$from);
// $yearsDataSolved->execute();
// $yearsListDataSolved = $yearsDataSolved->fetchAll();

// echo json_encode($yearsListDataSolved);



include 'connection.php';


function mergeArrays(...$arrays)
{
    $length = count($arrays[0]);
    $result = [];
    for ($i=0;$i<$length;$i++)
    {
        $temp = [];
        foreach ($arrays as $array)
            $temp[] = $array[$i];

        $result[] = $temp;
    }  $length = count($arrays[0]);
    $result = [];
    for ($i=0;$i<$length;$i++)
    {
        $temp = [];
        foreach ($arrays as $array)
            $temp[] = $array[$i];

        $result[] = $temp;
    }
    return $result;
}

$yearsData = $connect->prepare("SELECT year(DATETIME_FILED) AS YEAR,STATUS,COUNT(year(DATETIME_FILED)) AS TOTAL_FILED FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo GROUP BY year(DATETIME_FILED)");
$yearsData->bindParam(':dateTo' ,$to);
$yearsData->bindParam(':dateFrom' ,$from);
$yearsData->execute();
$yearsListData = $yearsData->fetchAll();


$solvedyears = $connect->prepare("SELECT year(DATETIME_FILED) AS YEAR,STATUS, COUNT(STATUS) AS TOTAL_SOLVED FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo && STATUS = 1 GROUP BY STATUS,year(DATETIME_FILED)");
$solvedyears->bindParam(':dateTo' ,$to);
$solvedyears->bindParam(':dateFrom' ,$from);
$solvedyears->execute();
$Data = $solvedyears->fetchAll();

if(empty($yearsListData)){
    echo null;
}else{

    foreach ($yearsListData as $key => $value) {
          $arr[] = [
                        'YEAR' => $value['YEAR'],
                        'TOTAL_FILED' => $value['TOTAL_FILED'],
                        'TOTAL_SOLVED'=> 0,
          ];
    }
    foreach ($arr as $key => $value) {

        foreach ($Data as $key2 => $value2) {
            if($value["YEAR"] == $value2['YEAR']){
                $arr[$key]['TOTAL_SOLVED'] = $value2["TOTAL_SOLVED"];  
            }
    
        }

    }
    echo json_encode($arr);

//     foreach ($Data as $key => $value) {
//         # code...
//             $solve[]= $value['TOTAL_SOLVED'];
//         // echo $key .$value['TOTAL_SOLVED'];
//     }

//     $three = 0;
//     while($three < count($yearsListData) ){
//         if(isset($solve[$three])){    

//         }else{
//             $solve[] = '0';
//         }
//       $three++;
//     }
    
//     // if($solved != null){
//     //     $solved[] = 0;
//     // }else{
//     //   
//     // }

  
//     foreach ($Data as $key => $value) {
//         $solarr[] =  array($value['YEAR'],$value['TOTAL_SOLVED']);
//         # code...
//     }
// // echo json_encode($solarr).'<br>';
// // echo count($solarr).'<br>';
//     $arr = mergeArrays($year,$filed,$solve);
//     $it = 0;

//   for ($i=0; $i < count($solarr) ; $i++) {     
//     foreach ($arr as $key => $value) {
//       if($value[0] == $solarr[$i][0]){
//             $arr[$key][2] = $solarr[$i][1];
//             continue;
        
//         }else{
            
                    
//             $arr[$key][2] = 0;
//             $newarr[] = array($value[0],$value[1],0);
          
//         }

//     }
// }
//     echo json_encode($arr);
    // echo json_encode($newarr);
       

 
         
          
    
    # code...

    // $it = 0;
    // $iy = 0;
    // do {
    //     do{
    //         if($arr[$it][0] == $solarr[$iy]){
    //             $arr[$it][2] =$solarr[$iy];
    //         }else{
    //             $arr[$it][2] = '0';
    //         }
    //         echo $solarr[$iy]['year'] . ' '.$arr[$it][0].'<br>';
    //         $iy++;
    //    }while($iy <= count($solarr)-1);
    //  $it++;
    // } while ($it <= count($arr)-1);

    // echo json_encode($arr);
    
    
}




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