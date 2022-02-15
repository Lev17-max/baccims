<?php

include 'show_list_crimes.php';

foreach ($allcrimedatas as $crimedatas) {

    $qry -> bindParam(1, $crimedatas['BLOTTER_ENTRY_NUMBER'] );
    $qry -> execute();
    $qdata = $qry->fetchAll();

    echo '<tr>';
    echo '<td class="font-weight-bold"> ' . $crimedatas['BLOTTER_ENTRY_NUMBER'];
    foreach ($qdata as $key) {

        
    $qry2 -> bindParam(1, $key['USER_DETAILS_ID']);
    $qry2 -> execute();
    $qrydata = $qry2->fetchAll();

        foreach ($qrydata as $value) {
           echo '<br><small class="text-muted" style="
           font-size: 10px;
       " disabled>';
           if($key['STATUS'] == 1){
             echo ucfirst(strtolower($value['LAST_NAME'])).' marked it <span class="badge badge-success"><i class="fas fa-check-circle"></i> Solved</span><br> on '.date('F d, Y g:i a', strtotime($key['DATETIME_EDITED']));
           }else if($key['STATUS'] == 0){
             echo ucfirst(strtolower($value['LAST_NAME'])).' marked it <span class="badge badge-danger"><i class="fas fa-file"></i> Filed</span> <br> on '.date('F d, Y g:i a', strtotime($key['DATETIME_EDITED']));
           }else{
            echo ucfirst(strtolower($value['LAST_NAME'])).' <span class="badge badge-secondary"><i class="fas fa-pen"></i> Edited </span> the crime incident<br> on '.date('F d, Y g:i a', strtotime($key['DATETIME_EDITED']));   
           }
          
          echo '</small></td>';
        }
    }
   
    echo '     <td class="font-weight-bold"> ' . strtoupper($crimedatas['INCIDENT']) .        '</td>';
    echo '     <td class="font-weight-bold"> ' . ucfirst(strtolower($crimedatas['COMPLAINANT_F'])) . ' ' . ucfirst(strtolower($crimedatas['COMPLAINANT_L'])) . '</td>';
    echo '     <td class="font-weight-bold"> '; 
    echo $crimedatas['ABBR']. '. ' . ucfirst(strtolower($crimedatas['INVESTIGATOR_F'])) . ' ' . ucfirst(strtolower($crimedatas['INVESTIGATOR_L']));
    echo '</td>' ;
    echo '     <td class="font-weight-bold"> ';
    echo date("F j, Y, g:i a",strtotime($crimedatas['DATETIME_FILED']));
    echo '     </td> ';
    echo '     <td class="font-weight-bold">';
    echo $crimedatas['PHASE']. ' '. $crimedatas['PUROK'].' ' .$crimedatas['BARANGAY'];
    echo '     </td> ';
    echo '     <td class="font-weight-bold">';
    if ($crimedatas['INCIDENT_STATUS'] == 1) {
        echo   '<span class="badge badge-success"><i class="fas fa-check-circle"></i>Solved</span>';
    } else if($crimedatas['INCIDENT_STATUS'] == 0){
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