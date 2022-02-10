<?php 

 include 'connection.php';
 $ok = 0;
 $crimeid = $_POST['crime-id-update'];
 $ben = $_POST['blotter-no-update'];
 $dtReported = date('Y-m-d H:i:s',strtotime($_POST['datetime-reported-update']));
 $dtHappened = date('Y-m-d H:i:s',strtotime($_POST['datetime-happened-update']));
 $status = $_POST['status-update'];
 $details = $_POST['incident-details-update'];
 $place = $_POST['incident-place-update'];
 $incident = $_POST['incident-type-update'];

 $instruct = $_POST['up-case-disp'];
 $investigator = $_POST['up-case-investigator'];
 $chief = $_POST['up-case-chief'];
 //item-a-update
 $fmname_item_a = ucfirst(strtolower($_POST['item-a-update-family-name']));
 $fname_item_a = ucfirst(strtolower($_POST['item-a-update-first-name']));
 $mname_item_a = ucfirst(strtolower($_POST['item-a-update-middle-name']));
 $qual_item_a =ucfirst(strtolower($_POST['item-a-update-qualifier']));
 $nick_item_a = ucfirst(strtolower($_POST['item-a-update-nickname']));
 $cit_item_a =ucfirst(strtolower($_POST['item-a-update-citizenship']));
 $civ_item_a =ucfirst(strtolower($_POST['item-a-update-civil-status']));
 $pbd_item_a =ucfirst(strtolower($_POST['item-a-update-pbd']));
 $currad_item_a =ucfirst(strtolower($_POST['item-a-update-current-addrs']));
 $sit_item_a =ucfirst(strtolower($_POST['item-a-update-sitio']));
 $brgy_item_a =ucfirst(strtolower($_POST['item-a-update-barangay']));
 $city_item_a =ucfirst(strtolower($_POST['item-a-update-city']));
 $prov_item_a =ucfirst(strtolower($_POST['item-a-update-province']));
 $othad_item_a =ucfirst(strtolower($_POST['item-a-update-other-addrs']));
 $sit2_item_a =ucfirst(strtolower($_POST['item-a-update-sitio2']));
 $brgy2_item_a =ucfirst(strtolower($_POST['item-a-update-barangay2']));
 $city2_item_a =ucfirst(strtolower($_POST['item-a-update-city2']));
 $prov2_item_a =ucfirst(strtolower($_POST['item-a-update-province2']));
 $educ_item_a =ucfirst(strtolower($_POST['item-a-update-educ']));
 $work_item_a =ucfirst(strtolower($_POST['item-a-update-work']));
 $id_have_item_a =ucfirst(strtolower($_POST['item-a-update-id-bought']));
 $sex_item_a =$_POST['item-a-update-gender'];
 $birth_item_a =$_POST['item-a-update-birthday'];
 $age_item_a =$_POST['item-a-update-age'];
 $hp_item_a =$_POST['item-a-update-home-phone'];
 $phone_item_a =$_POST['item-a-update-mobile-phone'];
 $email_item_a =$_POST['item-a-update-email'];
 if(isset($_POST['item-a-update-gender'])){
    $sex_item_a =$_POST['item-a-update-gender'];
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
     for($j = 0; $j <= count($_POST['item-'.$letter.'-update-family-name'])-1; $j++) { 
            if(isset($_POST['item-'.$letter.'-update-id'][$j]) || !empty($_POST['item-'.$letter.'-update-id'][$j])){
                $incid[$i][$j] = ucfirst(strtolower($_POST['item-'.$letter.'-update-id'][$j]));
            }else{  
                $incid[$i][$j] = 'NULL';
            }
        $fmname[$i][$j] = ucfirst(strtolower($_POST['item-'.$letter.'-update-family-name'][$j]));
        $fname[$i][$j] = ucfirst(strtolower($_POST['item-'.$letter.'-update-first-name'][$j]));
        $mname[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-middle-name'][$j]));
        $qual[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-qualifier'][$j]));
        $nick[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-nickname'][$j]));
        $cit[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-citizenship'][$j]));
        if(isset($_POST['item-'.$letter.'-update-gender'][$j])){
            $sex[$i][$j] =$_POST['item-'.$letter.'-update-gender'][$j];
        }else{
            $sex[$i][$j] = 0;
        }
        $civ[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-civil-status'][$j]));
        $birth[$i][$j] =$_POST['item-'.$letter.'-update-birthday'][$j];
        $age[$i][$j] =$_POST['item-'.$letter.'-update-age'][$j];
        $pbd[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-pbd'][$j]));
        $hp[$i][$j] =$_POST['item-'.$letter.'-update-home-phone'][$j];
        $phone[$i][$j] =$_POST['item-'.$letter.'-update-mobile-phone'][$j];
        $currad[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-current-addrs'][$j]));
        $sit[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-sitio'][$j]));
        $brgy[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-barangay'][$j]));
        $city[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-city'][$j]));
        $prov[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-province'][$j]));
        $othad[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-other-addrs'][$j]));
        $sit2[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-sitio2'][$j]));
        $brgy2[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-barangay2'][$j]));
        $city2[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-city2'][$j]));
        $prov2[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-province2'][$j]));
        $educ[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-educ'][$j]));
        $work[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-work'][$j]));
        $id_have[$i][$j] =ucfirst(strtolower($_POST['item-'.$letter.'-update-id-bought'][$j]));
        $email[$i][$j] =$_POST['item-'.$letter.'-update-email'][$j];  
     }

 }



    $query = $connect -> prepare('INSERT INTO `item_a`(`ID`,`BLOTTER_ENTRY_NO`, `FAMILY_NAME`, `FIRST_NAME`, 
                                                        `MIDDLE_NAME`, `QUALIFIER`, `NICKNAME`, `CITIZENSHIP`,
                                                        `GENDER`, `CIVIL_STATUS`, `BIRTHDATE`, `AGE`, `BIRTHPLACE`, 
                                                        `HOME_PHONE`, `MOBILE`, `CURRENT_ADDRESS`, `CURRENT_VILLAGE`, 
                                                        `CURRENT_BARANGAY`, `CURRENT_CITY`, `CURRENT_PROVINCE`, `OTHER_ADDRESS`, 
                                                        `OTHER_VILLAGE`, `OTHER_BARANGAY`, `OTHER_CITY`, `OTHER_PROVINCE`, 
                                                        `HIGHEST_EDUCATION`, `OCCUPATION`, `ID_PRESENTED`, `EMAIL`) 
                                                        VALUES (:id ,:ben,:fmname,:fname,:mname,:qual,
                                                        :nick,:cit,:sex,:civ,:bday,:age,:pbd,:hp,
                                                        :phone,:currad,:sit,:brgy,:city,:prov,:othad,
                                                        :sit2,:brgy2,:city2,:prov2,:educ,:work,:id_h,:email)
                                                ON DUPLICATE KEY 
                                                UPDATE `FAMILY_NAME` = :fmname, `FIRST_NAME` = :fname , 
                                                            `MIDDLE_NAME` = :mname, `QUALIFIER` = :qual, 
                                                            `NICKNAME` = :nick, `CITIZENSHIP` = :cit,
                                                            `GENDER` = :sex, `CIVIL_STATUS` = :civ,
                                                            `BIRTHDATE` = :bday, `AGE` = :age, 
                                                            `BIRTHPLACE` = :pbd, `HOME_PHONE` = :hp,
                                                            `MOBILE` = :phone, `CURRENT_ADDRESS` = :currad, 
                                                            `CURRENT_VILLAGE` = :sit, `CURRENT_BARANGAY` = :brgy, 
                                                            `CURRENT_CITY`= :city, `CURRENT_PROVINCE` = :prov, 
                                                            `OTHER_ADDRESS` = :othad, `OTHER_VILLAGE` = :sit2,
                                                            `OTHER_BARANGAY` = :brgy2, `OTHER_CITY` = :city2,
                                                            `OTHER_PROVINCE` = :prov2,  `HIGHEST_EDUCATION` = :educ,
                                                            `OCCUPATION` = :work, `ID_PRESENTED` = :id_h, `EMAIL` = :email;

                                                INSERT IGNORE INTO `item_d`(`ID`,`BLOTTER_ENTRY_NUMBER`, `DATETIME_HAPPEN`, `PLACE_ID`, `DETAILS`)
                                                        VALUES(:id,:ben,:dthap,:place,:det)
                                                        ON DUPLICATE KEY 
                                                UPDATE `DATETIME_HAPPEN` = :dthap, `PLACE_ID` = :place , `DETAILS` = :det;
                                              
                                                INSERT IGNORE INTO `incident`(`ID`,`BLOTTER_ENTRY_NUMBER`, `DATETIME_FILED`, `TYPE_OF_INCIDENT_ID`, `STATUS`) 
                                                        VALUES (:id,:ben,:dtfil,:inc,:stats) 
                                                        ON DUPLICATE KEY 
                                                UPDATE `DATETIME_FILED` = :dtfil, `TYPE_OF_INCIDENT_ID` = :inc , `STATUS` = :stats;
                                                
                                                INSERT IGNORE INTO `incident_case_disposition`(`ID`,`BLOTTER_ENTRY_NUMBER`, `INSTRUCTION`, `INVESTIGATOR`, `CHIEF`) 
                                                        VALUES (:id,:ben,:instruct,:invst,:chief)
                                                        ON DUPLICATE KEY 
                                                UPDATE `INSTRUCTION` = :instruct, `INVESTIGATOR` = :invst , `CHIEF` = :chief;
                                                
                                                ');

$query ->bindParam(':id', $crimeid);
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
        
        $qry =  $connect -> prepare('INSERT INTO `item_'.$letter.'`(`ID`,`BLOTTER_ENTRY_NO`, `FAMILY_NAME`, `FIRST_NAME`, 
                                                        `MIDDLE_NAME`, `QUALIFIER`, `NICKNAME`, `CITIZENSHIP`,
                                                        `GENDER`, `CIVIL_STATUS`, `BIRTHDATE`, `AGE`, `BIRTHPLACE`, 
                                                        `HOME_PHONE`, `MOBILE`, `CURRENT_ADDRESS`, `CURRENT_VILLAGE`, 
                                                        `CURRENT_BARANGAY`, `CURRENT_CITY`, `CURRENT_PROVINCE`, `OTHER_ADDRESS`, 
                                                        `OTHER_VILLAGE`, `OTHER_BARANGAY`, `OTHER_CITY`, `OTHER_PROVINCE`, 
                                                        `HIGHEST_EDUCATION`, `OCCUPATION`, `ID_PRESENTED`, `EMAIL`) 
                   
                                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)

                                                        ON DUPLICATE KEY 
                                                        UPDATE      `ID` = ?,`BLOTTER_ENTRY_NO` = ? ,`FAMILY_NAME` = ?, `FIRST_NAME` = ? , 
                                                                    `MIDDLE_NAME` = ?, `QUALIFIER` = ?, 
                                                                    `NICKNAME` = ?, `CITIZENSHIP` = ?,
                                                                    `GENDER` = ?, `CIVIL_STATUS` = ?,
                                                                    `BIRTHDATE` = ?, `AGE` = ?, 
                                                                    `BIRTHPLACE` = ?, `HOME_PHONE` = ?,
                                                                    `MOBILE` = ?, `CURRENT_ADDRESS` = ?, 
                                                                    `CURRENT_VILLAGE` = ?, `CURRENT_BARANGAY` =?, 
                                                                    `CURRENT_CITY`= ?, `CURRENT_PROVINCE` = ?, 
                                                                    `OTHER_ADDRESS` = ?, `OTHER_VILLAGE` = ?,
                                                                    `OTHER_BARANGAY` = ?, `OTHER_CITY` = ?,
                                                                    `OTHER_PROVINCE` = ?,  `HIGHEST_EDUCATION` =?,
                                                                    `OCCUPATION` = ?, `ID_PRESENTED` = ?, `EMAIL` = ?;
                       
                                                                    ');
        $qry ->bindParam(1, $incident_id);                                                              
        $qry ->bindParam(2, $qben); 
        $qry ->bindParam(3, $qfmname);
        $qry ->bindParam(4, $qmname);
        $qry ->bindParam(5, $qfname);
        $qry ->bindParam(6, $qqual);
        $qry ->bindParam(7, $qnick);
        $qry ->bindParam(8, $qcit);
        $qry ->bindParam(9, $qsex);
        $qry ->bindParam(10, $qciv);
        $qry ->bindParam(11, $qbirth);
        $qry ->bindParam(12, $qage);
        $qry ->bindParam(13, $qpbd);
        $qry ->bindParam(14, $qhp);
        $qry ->bindParam(15, $qphone);
        $qry ->bindParam(16, $qcurrad);
        $qry ->bindParam(17, $qsit);
        $qry ->bindParam(18, $qbrgy);
        $qry ->bindParam(19, $qcity);
        $qry ->bindParam(20, $qprov);
        $qry ->bindParam(21, $qothad);
        $qry ->bindParam(22, $qsit2);
        $qry ->bindParam(23, $qbrgy2);
        $qry ->bindParam(24, $qcity2);
        $qry ->bindParam(25, $qprov2);
        $qry ->bindParam(26, $qeduc);
        $qry ->bindParam(27, $qwork);
        $qry ->bindParam(28, $qid_have);
        $qry ->bindParam(29, $qemail);
        $qry ->bindParam(30, $incident_id);                                                              
        $qry ->bindParam(31, $qben); 
        $qry ->bindParam(32, $qfmname);
        $qry ->bindParam(33, $qmname);
        $qry ->bindParam(34, $qfname);
        $qry ->bindParam(35, $qqual);
        $qry ->bindParam(36, $qnick);
        $qry ->bindParam(37, $qcit);
        $qry ->bindParam(38, $qsex);
        $qry ->bindParam(39, $qciv);
        $qry ->bindParam(40, $qbirth);
        $qry ->bindParam(41, $qage);
        $qry ->bindParam(42, $qpbd);
        $qry ->bindParam(43, $qhp);
        $qry ->bindParam(44, $qphone);
        $qry ->bindParam(45, $qcurrad);
        $qry ->bindParam(46, $qsit);
        $qry ->bindParam(47, $qbrgy);
        $qry ->bindParam(48, $qcity);
        $qry ->bindParam(49, $qprov);
        $qry ->bindParam(50, $qothad);
        $qry ->bindParam(51, $qsit2);
        $qry ->bindParam(52, $qbrgy2);
        $qry ->bindParam(53, $qcity2);
        $qry ->bindParam(54, $qprov2);
        $qry ->bindParam(55, $qeduc);
        $qry ->bindParam(56, $qwork);
        $qry ->bindParam(57, $qid_have);
        $qry ->bindParam(58, $qemail);


        for($j = 0; $j <= count($fname[$i])-1;$j++) { 
          
            $incident_id =$incid[$i][$j];
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


