<?php

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
    }

    return $result;

}



 if(isset($_POST['from']) && isset($_POST['to'])){
     $from = $_POST['from'];
     $to = $_POST['to'];


 }else{

    $from = 2013;
    $to = 2022;

 }

 $crime_volume = $connect->prepare("SELECT *,MONTH(DATETIME_FILED) AS MONTHS,count(MONTH(DATETIME_FILED)) as MONTHDATA from `incident`WHERE YEAR(DATETIME_FILED) BETWEEN :from AND :to GROUP BY MONTH(DATETIME_FILED)");
 $crime_volume->bindParam(':from', $from);
 $crime_volume->bindParam(':to', $to);
 $crime_volume->execute();
 $crime_volumedata=$crime_volume->fetchAll();


 $pop = $connect->prepare('SELECT POPULATION FROM `statistic`');
 $pop->bindParam(':from', $from);
 $pop->bindParam(':to', $to);
 $pop->execute();
 $popdata=$pop->fetchAll();
if(!empty($crime_volumedata) && !empty($popdata)){



foreach ($crime_volumedata as $key => $value) {
    $array1[] = $value['MONTHDATA'];
   $array2[] = $value['MONTHS'];
}


foreach ($popdata as $key => $value) {
    $array3 =  (int)$value['POPULATION'];
}
$arr = mergeArrays($array1,$array2);



foreach ($arr as $key => $value) {
    # code...

    $finarr[] = array($value[0],$value[1],$array3);

}



    echo json_encode($finarr);


}

 ?>