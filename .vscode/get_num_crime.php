<?php

include 'connection.php';
$currdate = Date('Y');
$lastDate = $currdate - 1;
$defaultdate = $currdate;
$defaultdatelast = $defaultdate - 1;



$range = $connect->prepare("SELECT distinct count( BLOTTER_ENTRY_NUMBER) FROM `incident` where 
                                                year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo;");
$range->bindParam(':dateTo', $currdate);
$range->bindParam(':dateFrom', $lastDate);
$range->execute();
$rangeData = $range->fetchAll();


$defaultlastdate = $connect->prepare("SELECT distinct * FROM `incident` where 
 year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo ORDER BY MONTH(DATETIME_FILED) ASC");
$defaultlastdate->bindParam(':dateTo', $defaultdatelast);
$defaultlastdate->bindParam(':dateFrom', $defaultdatelast);
$defaultlastdate->execute();
$defaultData = $defaultlastdate->fetchAll();



//  $monthRange = $connect->prepare("SELECT distinct count( BLOTTER_ENTRY_NUMBER) FROM `incident` where 
//                                                 year(DATETIME_FILED) = :currdate");
//  $monthRange->bindParam(':currdate' ,$currdate);
//  $monthRange->bindParam(':dateFrom' ,$lastDate);
//  $monthRange->execute();
//  $monthdata = $monthRange->fetchAll();



$solved = $connect->prepare("SELECT distinct * FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo AND STATUS = 1 ORDER BY MONTH(DATETIME_FILED) ASC;");
$solved->bindParam(':dateTo', $currdate);
$solved->bindParam(':dateFrom', $lastDate);
$solved->execute();
$solvedData = $solved->fetchAll();

$yearsDataSolved = $connect->prepare("SELECT DISTINCT year(DATETIME_FILED) FROM `incident`WHERE STATUS=1 ORDER by year(DATETIME_FILED) ASC");
$yearsDataSolved->execute();
$yearsListDataSolved = $yearsDataSolved->fetchAll();



$yearsData = $connect->prepare("SELECT year(DATETIME_FILED) AS YEAR,STATUS,COUNT(year(DATETIME_FILED)) AS TOTAL FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo GROUP BY year(DATETIME_FILED)");
$yearsData->bindParam(':dateTo', $currdate);
$yearsData->bindParam(':dateFrom', $lastDate);
$yearsData->execute();
$yearsListData = $yearsData->fetchAll();



function mergeArrays(...$arrays)
{

    $length = count($arrays[0]);
    $result = [];
    for ($i = 0; $i < $length; $i++) {
        $temp = [];
        foreach ($arrays as $array)
        {
            if(isset($array[$i])){
              $temp[] = $array[$i];
            }else{
                $temp[] = 0;
            }
            
            
        
        }

        $result[] = $temp;
    }

    return $result;
}






$yearsData = $connect->prepare("SELECT year(DATETIME_FILED) AS YEAR,STATUS,COUNT(year(DATETIME_FILED)) AS TOTAL_FILED FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo GROUP BY year(DATETIME_FILED)");
$yearsData->bindParam(':dateTo', $currdate);
$yearsData->bindParam(':dateFrom', $lastDate);
$yearsData->execute();
$yearsListData = $yearsData->fetchAll();

$solvedyears = $connect->prepare("SELECT year(DATETIME_FILED) AS YEAR,STATUS, COUNT(STATUS) AS TOTAL_SOLVED FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo && STATUS = 1 GROUP BY STATUS,year(DATETIME_FILED)");
$solvedyears->bindParam(':dateTo', $currdate);
$solvedyears->bindParam(':dateFrom', $lastDate);
$solvedyears->execute();
$Data = $solvedyears->fetchAll();

if (!empty($yearsListData) & !empty($Data)) {
    foreach ($yearsListData as $key => $value) {
        # code...

        $year[] = $value['YEAR'];
        $filed[] = $value['TOTAL_FILED'];
    }

    foreach ($Data as $key => $value) {
        # code...

        $solve[] = $value['TOTAL_SOLVED'];
    }
} else {
    $year[] = 0;
    $filed[] = 0;
    $solve[] = 0;
}


$arr = mergeArrays($year, $filed, $solve);









// foreach ($yearsListData as $key => $value) {

//     // $year[] = '"' . $value['YEAR'] . '"';
//     echo $value['TOTAL'];

// }
// echo implode(',', $year);


foreach ($yearsListData as $key) {

    // $yearsL[] = Date('Y' ,strtotime($key[0]));
    $listofyear[] = $key[0];
    // echo $key[1];
}
foreach ($yearsListDataSolved as $key) {
    $listofyearsolved[] = $key[0];
    # code...

}



$crime_volume = $connect->prepare("SELECT *,MONTH(DATETIME_FILED) AS MONTHS,count(MONTH(DATETIME_FILED)) as MONTHDATA from `incident`WHERE YEAR(DATETIME_FILED) BETWEEN :from AND :to GROUP BY MONTH(DATETIME_FILED)");
$crime_volume->bindParam(':from', $lastDate);
$crime_volume->bindParam(':to', $currdate);
$crime_volume->execute();
$crime_volumedata = $crime_volume->fetchAll();


$pop = $connect->prepare('SELECT POPULATION FROM `statistic`');
$pop->execute();
$popdata = $pop->fetchAll();


foreach ($crime_volumedata as $key => $value) {
    $array1[] = $value['MONTHDATA'];
    $array2[] = $value['MONTHS'];

}
if(!empty($array1) && !empty($array2)){


foreach ($popdata as $key => $value) {
    $array3 =  (int)$value['POPULATION'];
}
$arrm = mergeArrays($array1, $array2);



foreach ($arrm as $key => $value) {
    # code...

    $finarr[] = array($value[0], $value[1], $array3);
}




foreach ($finarr as $key => $value) {


    $totalm = (int) $value[0];
    $populationm = (int) $value[2];


    $formula1m = (int) ($totalm * 100000);
    $formula2m = (float) ($formula1m / $populationm);
    # code...

    // echo 'month :'. $value[1].'<br>';
    // echo 'total :'. $value[0].'<br>';
    // echo 'population :'. $value[2].'<br>';
    // echo 'solve-1 :'.$formula1.'<br>';
    // echo 'answer :'. $formula2.'<br><hr>';

    // echo 'answer :'. (200000/29396).'<br><hr>';
    $solutionarrm[] = array($value['1'], $formula2m);
}


$ticks = 1;
if (!empty($solutionarrm)) {


    while ($ticks < 13) {
        foreach ($solutionarrm as $key => $value) {
            if ($ticks == $value[0]) {
                $volume[] = $value[1];
            } else {
                $volume[] =  0;
            }
            $ticks++;
        }
    }
    // echo implode(',', $array4);
} else {
    $ticks = 1;
    while ($ticks < 13) {

        $volume[] =  0;

        $ticks++;
    }
}
}



//    echo json_encode($solutionarr);




// echo implode(',', $yearsL1);

// $listofyearindex = array_count_values($listofyear);
// if (!empty($listofyearsolved)) {
// $listofyearindexsolved = array_count_values($listofyearsolved);
// }

// foreach ($listofyearindex as $filed => $val1) {
//     if (!empty($listofyearsolved)) {
//         foreach ($listofyearindexsolved as $solved => $val2) {
//             $formula = ($val2 / $val1) * 100;
//             $solution = array(array($filed, $formula));
//         }
//     }else{

//             $formula = (0 / $val1) * 100;
//             $solution = array(array($filed, $formula));

//     }
// }


// print_r($solution);


// foreach ($solution as $key => $value) {

//     echo $key.' => ' .$value[1]. '<br>';
//     # code...
// }







// $count4 = 1;
// if (!empty($yearsListDataSolved)) {
// foreach ($solvedlastData as $key) {

//     $YCSolved[] = $key[2];
// }
// $yearsolvedarr = array_count_values($YCSolved);

// while ($count4 < 13) {
//     foreach ($yearsolvedarr as $key => $value) {
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


































// echo implode(',', $yearsL2);


// $yeararr = array_count_values($yearsL1);
// $yeararr2 = array_count_values($yearsL2);
// // $valkey = 0;
//     foreach ($yeararr as $reported => $num_crimes_reported) {

//         foreach ($yeararr2 as $solved => $num_crimes_solved) {
//         if($solved == $reported){
//             $yeararrlist[] = $solved;
//             $yeararrdata[] = ($num_crimes_solved/$num_crimes_reported*100);

//         }

//     }
//     echo implode(',',$yeararrdata);
// }
//     $counter = 0;
//     while(count($yearsL1)-1 >= $counter){
//         foreach ($yeararrlist as $keys => $value) {

//         //    echo $yearsL1[$counter];
//             // echo $value.'<br>';
//                 if($yearsL1[$counter] == $value){
//                     $finalarr[] = $yeararrdata[0];
//                     $counter++;
//                 }
//                 else{
//                 $finalarr[] = 0;
//                 $counter++;
//                 }

//             }



//     }
//   echo implode(',', $finalarr) .'<br>';

//   echo implode(',', $yeararrlistsolved);

//   echo '<br>'.count($yeararrlistsolved);
// $yeararr = array_count_values($yearsL);
// $valkey = 0;
//     foreach ($yeararr as $key => $value) {

//         $yeararrlist[] = $value;

//     }


//     echo implode(',', $yeararrlist);

// foreach ($yearsListData as $key) {

//     // $yearsL[] = Date('Y' ,strtotime($key[0]));
//     $yearsL[] = $key[0];

// } 
// $yeararr = array_count_values($yearsL);
// $valkey = 0;
//     foreach ($yeararr as $key => $value) {
//            $array[] = $value;

//       }


//     echo implode(',', $array);




$solvedlast = $connect->prepare("SELECT distinct * FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo AND STATUS = 1 ORDER BY MONTH(DATETIME_FILED) ASC;");
$solvedlast->bindParam(':dateTo', $defaultdate);
$solvedlast->bindParam(':dateFrom', $defaultdatelast);
$solvedlast->execute();
$solvedlastData = $solvedlast->fetchAll();

$count4 = 1;
if (!empty($solvedlastData)) {
    foreach ($solvedlastData as $key) {

        $solve2[] = Date('m', strtotime($key[2]));
    }
    $solvearr = array_count_values($solve2);

    while ($count4 < 13) {
        foreach ($solvearr as $key => $value) {
            if ($count4 == $key) {
                $array4[] = $value;
            } else {
                $array4[] =  0;
            }
            $count4++;
        }
    }
    // echo implode(',', $array4);
} else {
    $count4 = 1;
    while ($count4 < 13) {

        $array4[] =  0;

        $count4++;
    }
}


// foreach ($solvedlastData as $key => $value) {
//     echo $count++ ,$value;
//     if (empty($value)) {
//        echo '1';
//     }
// }


// foreach ($solvedlastData as $row) {
// //    $array[] = Date('m' ,strtotime($row[2]));
// echo $row[4];
// }
// $array2 = array_count_values($array);
// foreach ($array2 as $key => $value) {
//     echo $key . " : " . $value . "<br>";
// }
// foreach ($solvedData as $key) {
// echo $key[0].'<br>';
// }
$data = $connect->prepare("SELECT distinct * FROM `incident` where 
year(DATETIME_FILED) BETWEEN :dateFrom AND :dateTo ORDER BY MONTH(DATETIME_FILED) ASC");
$data->bindParam(':dateTo', $currdate);
$data->bindParam(':dateFrom', $lastDate);
$data->execute();
$dataArray = $data->fetchAll();

$count = 1;
if (!empty($dataArray)) {
    foreach ($dataArray as $key) {

        $given1[] = Date('m', strtotime($key[2]));
    }
    $arraya1 = array_count_values($given1);
    while ($count < 13) {
        foreach ($arraya1 as $key => $value) {
            if ($count == $key) {
                $array[] = $value;
            } else {
                $array[] =  0;
            }
            $count++;
        }
    }

    // echo implode(',', $array);
} else {
    while ($count < 13) {

        $array[] =  0;

        $count++;
    }

    // echo implode(',', $array);
}
