<?php

include 'show_list_crimes.php';
if(isset($_POST['usid'])){
    $usid = $_POST['usid'];
}else{
 $usid = $_SESSION['USER_ID'];
}


foreach ($allcrimedatas as $crimedatas) {

    $qry -> bindParam(1, $crimedatas['BLOTTER_ENTRY_NUMBER'] );
    $qry -> execute();
    $qdata = $qry->fetchAll();

    $qry2 -> bindParam(1, $usid);
    $qry2 -> execute();
    $qrydata = $qry2->fetchAll();

    echo '<tr>';
    echo '<td class="font-weight-bold"> ' . $crimedatas['BLOTTER_ENTRY_NUMBER'];
    foreach ($qdata as $key) {
        foreach ($qrydata as $value) {
           echo '<br><small class="text-muted" style="
           font-size: 10px;
       " disabled>';
           if($key['STATUS'] == 1){
             echo ucfirst(strtolower($value['LAST_NAME'])).' marked it solved<br> on '.date('F d, Y g:i a', strtotime($key['DATETIME_EDITED']));
           }else if($key['STATUS'] == 0){
             echo ucfirst(strtolower($value['LAST_NAME'])).' marked it filed <br> on '.date('F d, Y g:i a', strtotime($key['DATETIME_EDITED']));
           }else{
            echo ucfirst(strtolower($value['LAST_NAME'])).' edited the crime incident<br> on '.date('F d, Y g:i a', strtotime($key['DATETIME_EDITED']));   
           }
          
          echo '</small></td>';
        }
    
    }
   
    echo '     <td class="font-weight-bold"> ' .          $crimedatas['NAME'] .        '</td>';
    echo '     <td class="font-weight-bold"> ' . ucfirst(strtolower($crimedatas['11'])) . ' ' . ucfirst(strtolower($crimedatas['12'])) . '</td>';
    echo '     <td class="font-weight-bold"> ';
    echo date("F j, Y, g:i a",strtotime($crimedatas['DATETIME_FILED']));
    echo '     </td> ';
    echo '     <td class="font-weight-bold">';
    echo $crimedatas['PHASE']. ' '. $crimedatas['PUROK'].' ' .$crimedatas['BARANGAY'];
    echo '     </td> ';
    echo '     <td class="font-weight-bold">';
    if ($crimedatas['STATUS'] == 1) {
        echo   '<span class="badge badge-success"><i class="fas fa-check-circle"></i>Solved</span>';
    } else if($crimedatas['STATUS'] == 0){
        echo  '<span class="badge badge-danger"><i class="fas fa-file"></i>Filed</span>';
    }
    echo '     </td>';
    echo '     
           <td class="project-actions text-right font-weight-bold">
           <button class="btn btn-app bg-secondary record-option" onclick="submitReport(' . $crimedatas[0] . ')"  >
              <i class="fas fa-cog"></i> options
           </button>
           </td>';

    echo '</tr>';
}

?>