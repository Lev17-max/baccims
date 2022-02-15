<?php 

 include 'connection.php';
 $ok = 0;

 $ben = $_POST['blotter-no'];
 $dtReported = date('Y-m-d H:i:s',strtotime($_POST['datetime-reported']));
 $dtHappened = date('Y-m-d H:i:s',strtotime($_POST['datetime-happened']));
 $status = $_POST['status'];
 $details = $_POST['incident-details'];
 $place = $_POST['incident-place'];
 $incident = $_POST['incident-type'];

 $instruct = $_POST['case-disp'];
 $investigator = $_POST['case-investigator'];
 $chief = $_POST['case-chief'];

 //item-a
 $fmname_item_a = ucfirst(strtolower($_POST['item-a-family-name']));
 $fname_item_a = ucfirst(strtolower($_POST['item-a-first-name']));
 $mname_item_a = ucfirst(strtolower($_POST['item-a-middle-name']));
 $qual_item_a =ucfirst(strtolower($_POST['item-a-qualifier']));
 $nick_item_a = ucfirst(strtolower($_POST['item-a-nickname']));
 $cit_item_a =ucfirst(strtolower($_POST['item-a-citizenship']));
 $civ_item_a =ucfirst(strtolower($_POST['item-a-civil-status']));
 $pbd_item_a =ucfirst(strtolower($_POST['item-a-pbd']));
 $currad_item_a =ucfirst(strtolower($_POST['item-a-current-addrs']));
 $sit_item_a =ucfirst(strtolower($_POST['item-a-sitio']));
 $brgy_item_a =ucfirst(strtolower($_POST['item-a-barangay']));
 $city_item_a =ucfirst(strtolower($_POST['item-a-city']));
 $prov_item_a =ucfirst(strtolower($_POST['item-a-province']));
 $othad_item_a =ucfirst(strtolower($_POST['item-a-other-addrs']));
 $sit2_item_a =ucfirst(strtolower($_POST['item-a-sitio2']));
 $brgy2_item_a =ucfirst(strtolower($_POST['item-a-barangay2']));
 $city2_item_a =ucfirst(strtolower($_POST['item-a-city2']));
 $prov2_item_a =ucfirst(strtolower($_POST['item-a-province2']));
 $educ_item_a =ucfirst(strtolower($_POST['item-a-educ']));
 $work_item_a =ucfirst(strtolower($_POST['item-a-work']));
 $id_have_item_a =ucfirst(strtolower($_POST['item-a-id-bought']));
 $sex_item_a =$_POST['item-a-gender'];
 $birth_item_a =$_POST['item-a-birthday'];
 $age_item_a =$_POST['item-a-age'];
 $hp_item_a =$_POST['item-a-home-phone'];
 $phone_item_a =$_POST['item-a-mobile-phone'];
 $email_item_a =$_POST['item-a-email'];
 if(isset($_POST['item-a-gender'])){
    $sex_item_a =$_POST['item-a-gender'];
}else{
    $sex_item_a = 0;
}

 $i = 1;
 $j = 0;
 $letter = '';

 for($i= 1; $i <= 2; $i++){
     if ($i == 1) {
        $letter = 'b';
    } else if ($i == 2) {
        $letter = 'c';
    } 
     for($j = 0; $j <= count($_POST['item-'.$letter.'-family-name'])-1; $j++) { 
        $fmname[$i][$j] = ucfirst(strtolower($_POST['item-'.$letter.'-family-name'][$j]));
        $fname[$i][$j] = ucfirst(strtolower($_POST['item-'.$letter.'-first-name'][$j]));
        $mname[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-middle-name'][$j]));
        $qual[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-qualifier'][$j]));
        $nick[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-nickname'][$j]));
        $cit[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-citizenship'][$j]));
        if(isset($_POST['item-'.$letter.'-gender'][$j])){
            $sex[$i][$j] =$_POST['item-'.$letter.'-gender'][$j];
        }else{
            $sex[$i][$j] = 0;
        }
        $civ[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-civil-status'][$j]));
        $birth[$i][$j] =$_POST['item-'.$letter.'-birthday'][$j];
        $age[$i][$j] =$_POST['item-'.$letter.'-age'][$j];
        $pbd[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-pbd'][$j]));
        $hp[$i][$j] =$_POST['item-'.$letter.'-home-phone'][$j];
        $phone[$i][$j] =$_POST['item-'.$letter.'-mobile-phone'][$j];
        $currad[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-current-addrs'][$j]));
        $sit[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-sitio'][$j]));
        $brgy[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-barangay'][$j]));
        $city[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-city'][$j]));
        $prov[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-province'][$j]));
        $othad[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-other-addrs'][$j]));
        $sit2[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-sitio2'][$j]));
        $brgy2[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-barangay2'][$j]));
        $city2[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-city2'][$j]));
        $prov2[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-province2'][$j]));
        $educ[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-educ'][$j]));
        $work[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-work'][$j]));
        $id_have[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-id-bought'][$j]));
        $email[$i][$j] =$_POST['item-'.$letter.'-email'][$j];
     
     }

 }

    $query = $connect -> prepare('INSERT INTO `item_a`(`BLOTTER_ENTRY_NO`, `FAMILY_NAME`, `FIRST_NAME`, 
                                        `MIDDLE_NAME`, `QUALIFIER`, `NICKNAME`, `CITIZENSHIP`,
                                        `GENDER`, `CIVIL_STATUS`, `BIRTHDATE`, `AGE`, `BIRTHPLACE`, 
                                        `HOME_PHONE`, `MOBILE`, `CURRENT_ADDRESS`, `CURRENT_VILLAGE`, 
                                        `CURRENT_BARANGAY`, `CURRENT_CITY`, `CURRENT_PROVINCE`, `OTHER_ADDRESS`, 
                                        `OTHER_VILLAGE`, `OTHER_BARANGAY`, `OTHER_CITY`, `OTHER_PROVINCE`, 
                                        `HIGHEST_EDUCATION`, `OCCUPATION`, `ID_PRESENTED`, `EMAIL`) 
                                        VALUES (:ben,:fmname,:fname,:mname,:qual,
                                        :nick,:cit,:sex,:civ,:bday,:age,:pbd,:hp,
                                        :phone,:currad,:sit,:brgy,:city,:prov,:othad,
                                        :sit2,:brgy2,:city2,:prov2,:educ,:work,:id_h,:email);

                                  INSERT INTO `item_d`(`BLOTTER_ENTRY_NUMBER`, `DATETIME_HAPPEN`, `PLACE_ID`, `DETAILS`)
                                         VALUES(:ben,:dthap,:place,:det);

                                  INSERT IGNORE INTO `incident`(`BLOTTER_ENTRY_NUMBER`, `DATETIME_FILED`, `TYPE_OF_INCIDENT_ID`, `STATUS`) 
                                         VALUES (:ben,:dtfil,:inc,:stats);

                                  INSERT INTO `incident_case_disposition`(`BLOTTER_ENTRY_NUMBER`, `INSTRUCTION`, `INVESTIGATOR`, `CHIEF`) 
                                         VALUES (:ben,:instruct,:invst,:chief);
                                         
                                         ');


$query ->bindParam(':fmname', $fmname_item_a);
$query ->bindParam(':mname', $mname_item_a);
$query ->bindParam(':fname', $fname_item_a);
$query ->bindParam(':qual', $qual_item_a);
$query ->bindParam(':nick', $nick_item_a);
$query ->bindParam(':cit', $cit_item_a);
$query ->bindParam('sex', $sex_item_a);
$query ->bindParam('civ', $civ_item_a);
$query ->bindParam(':bday', $birth_item_a);
$query ->bindParam(':age', $age_item_a);
$query ->bindParam(':pbd', $pbd_item_a);
$query ->bindParam(':hp', $hp_item_a);
$query ->bindParam(':phone', $phone_item_a);
$query ->bindParam(':currad', $currad_item_a);
$query ->bindParam(':sit', $sit_item_a);
$query ->bindParam(':brgy', $brgy_item_a);
$query ->bindParam(':city', $city_item_a);
$query ->bindParam(':prov', $prov_item_a);
$query ->bindParam(':othad', $othad_item_a);
$query ->bindParam(':sit2', $sit2_item_a);
$query ->bindParam(':brgy2', $brgy2_item_a);
$query ->bindParam(':city2', $city2_item_a);
$query ->bindParam(':prov2', $prov2_item_a);
$query ->bindParam(':educ', $educ_item_a);
$query ->bindParam(':work', $work_item_a);
$query ->bindParam(':id_h',$id_have_item_a);
$query ->bindParam(':email', $email_item_a);

$query ->bindParam(':ben', $ben);
$query ->bindParam(':dtfil', $dtReported);
$query ->bindParam(':inc',$incident);
$query ->bindParam(':stats', $status);
$query ->bindParam(':det', $details);
$query ->bindParam(':dthap', $dtHappened);
$query ->bindParam(':place', $place);

$query ->bindParam(':instruct', $instruct);
$query ->bindParam(':invst', $investigator);
$query ->bindParam(':chief', $chief);
$query->execute();
if($query){
        

    for($i = 1; $i <= count($fname); $i++){
        if ($i == 1) {
        $letter = 'b';
        } else if ($i == 2) {
        $letter = 'c';
        } 
        $qry =  $connect -> prepare('INSERT INTO `item_'.$letter.'`(`BLOTTER_ENTRY_NO`, `FAMILY_NAME`, `FIRST_NAME`, 
                                                        `MIDDLE_NAME`, `QUALIFIER`, `NICKNAME`, `CITIZENSHIP`,
                                                        `GENDER`, `CIVIL_STATUS`, `BIRTHDATE`, `AGE`, `BIRTHPLACE`, 
                                                        `HOME_PHONE`, `MOBILE`, `CURRENT_ADDRESS`, `CURRENT_VILLAGE`, 
                                                        `CURRENT_BARANGAY`, `CURRENT_CITY`, `CURRENT_PROVINCE`, `OTHER_ADDRESS`, 
                                                        `OTHER_VILLAGE`, `OTHER_BARANGAY`, `OTHER_CITY`, `OTHER_PROVINCE`, 
                                                        `HIGHEST_EDUCATION`, `OCCUPATION`, `ID_PRESENTED`, `EMAIL`) 
                   
                                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $qry ->bindParam(1, $qben); 
        $qry ->bindParam(2, $qfmname);
        $qry ->bindParam(3, $qmname);
        $qry ->bindParam(4, $qfname);
        $qry ->bindParam(5, $qqual);
        $qry ->bindParam(6, $qnick);
        $qry ->bindParam(7, $qcit);
        $qry ->bindParam(8, $qsex);
        $qry ->bindParam(9, $qciv);
        $qry ->bindParam(10, $qbirth);
        $qry ->bindParam(11, $qage);
        $qry ->bindParam(12, $qpbd);
        $qry ->bindParam(13, $qhp);
        $qry ->bindParam(14, $qphone);
        $qry ->bindParam(15, $qcurrad);
        $qry ->bindParam(16, $qsit);
        $qry ->bindParam(17, $qbrgy);
        $qry ->bindParam(18, $qcity);
        $qry ->bindParam(19, $qprov);
        $qry ->bindParam(20, $qothad);
        $qry ->bindParam(21, $qsit2);
        $qry ->bindParam(22, $qbrgy2);
        $qry ->bindParam(23, $qcity2);
        $qry ->bindParam(24, $qprov2);
        $qry ->bindParam(25, $qeduc);
        $qry ->bindParam(26, $qwork);
        $qry ->bindParam(27, $qid_have);
        $qry ->bindParam(28, $qemail);


        for($j = 0; $j <= count($fname[$i])-1;$j++) { 
            $qben  =  $ben; 
            $qfmname =  $fmname[$i][$j];
            $qmname =  $mname[$i][$j];
            $qfname =  $fname[$i][$j];
            $qqual =  $qual[$i][$j];
            $qnick =  $nick[$i][$j];
            $qcit =  $cit[$i][$j];
            $qsex =  $sex[$i][$j];
            $qciv =  $civ[$i][$j];
            $qbirth =  $birth[$i][$j];
            $qage =  $age[$i][$j];
            $qpbd =  $pbd[$i][$j];
            $qhp =  $hp[$i][$j];
            $qphone =  $phone[$i][$j];
            $qcurrad =  $currad[$i][$j];
            $qsit =  $sit[$i][$j];
            $qbrgy =  $brgy[$i][$j];
            $qcity =  $city[$i][$j];
            $qprov =  $prov[$i][$j];
            $qothad =  $othad[$i][$j];
            $qsit2 =  $sit2[$i][$j];
            $qbrgy2 =  $brgy2[$i][$j];
            $qcity2 =  $city2[$i][$j];
            $qprov2 =  $prov2[$i][$j];
            $qeduc =  $educ[$i][$j];
            $qwork =  $work[$i][$j];
            $qid_have =  $id_have[$i][$j];
            $qemail =  $email[$i][$j];
        $qry->closeCursor();
            $qry->execute();
            
           
            } 
           
            if($qry){
                $ok = 204;
            }else{
                $ok = 504;
            }
    }
        if($ok == 204){
            header("location:home.php?successform");
        }else if($ok == 504){
            header("location:home.php?errorform");
        }

}else{
    header("location:home.php?errorform");
}
?>


