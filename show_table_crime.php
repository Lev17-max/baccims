<?php

include 'show_list_crimes.php';


foreach ($allcrimedatas as $crimedatas) {

    echo '<tr>';
    echo '     <td> ' . $crimedatas['BLOTTER_ENTRY_NUMBER'] . '</td>';
    echo '     <td> ' .          $crimedatas['NAME'] .        '</td>';
    echo '     <td> ' . ucfirst(strtolower($crimedatas['11'])) . ' ' . ucfirst(strtolower($crimedatas['12'])) . '</td>';
    echo '     <td> ';
    echo date("F j, Y, g:i a",strtotime($crimedatas['DATETIME_FILED']));
    echo '     </td> ';
    echo '     <td> ';
    echo $crimedatas['PHASE']. ' '. $crimedatas['PUROK'].' ' .$crimedatas['BARANGAY'];
    echo '     </td> ';
    echo '     <td>';
    if ($crimedatas['STATUS'] == 1) {
        echo   '<span class="badge badge-success"><i class="fas fa-check-circle"></i>Solved</span>';
    } else if($crimedatas['STATUS'] == 0){
        echo  '<span class="badge badge-danger"><i class="fas fa-file"></i>Filed</span>';
    }
    echo '     </td>';
    echo '     
           <td class="project-actions text-right">
           <button class="btn btn-app bg-secondary record-option" onclick="submitReport(' . $crimedatas[0] . ')"  >
              <i class="fas fa-cog"></i> options
           </button>
           </td>';

    echo '</tr>';
}

?>