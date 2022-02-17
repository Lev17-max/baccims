
<?php

include 'connection.php';
$query = $connect->prepare("SELECT log.USER_ID AS USER_ID, ud.FIRST_NAME as FIRST_NAME,ud.MIDDLE_NAME as MIDDLE_NAME,
                                    ud.LAST_NAME AS LAST_NAME,u.ACCESS_LEVEL as USER_TYPE,ud2.FIRST_NAME as ADMIN_FIRST_NAME,
                                    ud2.MIDDLE_NAME as ADMIN_MIDDLE_NAME,ud2.LAST_NAME AS ADMIN_LAST_NAME , u2.ACCESS_LEVEL as ADMIN_LEVEL,
                                    GROUP_CONCAT(ud.FIRST_NAME,' ',ud.MIDDLE_NAME,' ', ud.LAST_NAME ,'=', log.STATUS ) as RECORDS, 
                                    TIME(DATETIME_EDITED) as TIME,DATETIME_EDITED  FROM `user_logs` log 
                                JOIN user_details ud ON log.USER_ID = ud.ID 
                                JOIN user u ON log.USER_ID = u.USER_DETAILS_ID
                                JOIN user_details ud2 ON log.USER_DETAILS_ID = ud2.ID
                                JOIN user u2 ON log.USER_DETAILS_ID = u2.USER_DETAILS_ID
                                GROUP BY log.USER_DETAILS_ID,YEAR(DATETIME_EDITED),MONTH(DATETIME_EDITED),DAY(DATETIME_EDITED),TIME(DATETIME_EDITED),HOUR(DATETIME_EDITED) ORDER BY DATETIME_EDITED DESC;");
$query->execute();
$result = $query->fetchAll();
$pol = $connect->prepare("SELECT * FROM `police` p 
                          JOIN police_rank prnk ON prnk.ID = p.POLICE_RANK_ID
                          WHERE USER_DETAILS_ID = ?");


$pastDate = '';
$userlevel = '';
$adminlevel = '';
$rank = '';
foreach ($result as $data) {

  if ($data['ADMIN_LEVEL'] == 2) {
    $adminlevel = "Barangay Official";
  } else {
    $adminlevel = "Super Admin";
  }
  if ($data['USER_TYPE'] == 1) {
    $userlevel = "Police";
    $pol->bindParam(1, $data['USER_ID']);
    $pol->execute();
    $poldata = $pol->fetchAll();

    foreach ($poldata as $key) {
      $rank = $key['NAME'];
    }
  } else if ($data['USER_TYPE'] == 0) {
    $userlevel = "Resident";
  } else if ($data['USER_TYPE'] == 3) {
    $userlevel = "Super Admin";
  } else {
    $userlevel = "Barangay Official";
  }

  // code...
  if (date('Y/m/d', strtotime($data['DATETIME_EDITED'])) != $pastDate) {
    if (date('d', strtotime($data['DATETIME_EDITED'])) % 2 == 0) {
      echo '
                  <!-- timeline time label -->
                       
                       <div class="time-label">
                         <span class="bg-red">' . date('F d,Y', strtotime($data['DATETIME_EDITED'])) . '</span>
                       </div>
                       ';
    } else {
      echo '
                  <!-- timeline time label -->
                       
                       <div class="time-label">
                         <span class="bg-green">' . date('F d,Y', strtotime($data['DATETIME_EDITED'])) . '</span>
                       </div>
                       ';
    }



    echo ' 
                       <!-- timeline item -->
                       <div>
                         <i class="fas fa-clock bg-blue"></i>
                         <div class="timeline-item">
                        
                           <h1 class="timeline-header"><a style="font-size: 20px; " href="#">' . ucfirst($data['ADMIN_FIRST_NAME']) . ' ' . ucfirst($data['ADMIN_LAST_NAME']) . ' </a> <br> ' . $adminlevel . '</h1>
                        
                           <div class="timeline-body">';

    $str = explode(",", $data['RECORDS']);
    foreach ($str as $key => $value) {
      $word = explode("=", $value);

      if ($word[1] == 1) {
        echo 'Marked <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  as <span class="badge badge-danger"><i class="fas fa-ban"></i> archived </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
      }
      else if ($word[1] == 0) {
        echo 'Marked <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  as <span class="badge badge-success"><i class="fas fa-check"></i> active </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
      }
       else if ($word[1] == 3) {
        echo 'Marked <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span> registration <span class="badge badge-success"><i class="fas fa-check-double"></i> approved </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
      } 
      else if ($word[1] == 4) {
        echo 'Marked <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span> registration <span class="badge badge-warning"><i class="fas fa-spinner"></i> declined and requested new ID </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
      }
      else if ($word[1] == 5) {
          if ($data['USER_TYPE'] == 1) {
          echo 'Created New <small class="badge badge-warning">Police</small> Account with a rank of <small class="badge badge-warning">'.$rank.'</small> on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          }else if($data['USER_TYPE'] == 2){
            echo 'Created New <small class="badge badge-primary">'.$userlevel.'</small> Account on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          }else{
            echo 'Created New <small class="badge badge-secondary">'.$userlevel.'</small> Account on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          
          }
      }
      else if ($word[1] == 2) {
        if ($data['USER_TYPE'] == 1) {
        echo 'Changed <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  into <span class="badge badge-warning"> '. $rank.' </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
        }else if($data['USER_TYPE'] == 2){
          echo 'Changed <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  into <span class="badge badge-primary"> '. $userlevel.' </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
        }else{
          echo 'Changed <span class="badge badge-secondary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  into <span class="badge badge-secondary"> '. $userlevel.' </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
        
        }
      }
    }


    echo '</div>
                         </div>
                       </div>
                    ';
  } else {
    echo ' 
    <!-- timeline item -->
    <div>
      <i class="fas fa-clock bg-grey"></i>
      <div class="timeline-item">
     
        <h1 class="timeline-header"><a style="font-size: 20px; " href="#">' . ucfirst($data['ADMIN_FIRST_NAME']) . ' ' . ucfirst($data['ADMIN_LAST_NAME']) . ' </a> <br> ' . $adminlevel . '</h1>
     
        <div class="timeline-body">';

        $str = explode(",", $data['RECORDS']);
        foreach ($str as $key => $value) {
          $word = explode("=", $value);

    
          if ($word[1] == 1) {
            echo 'Marked <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  as <span class="badge badge-danger"><i class="fas fa-ban"></i> archived </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          }
          else if ($word[1] == 0) {
            echo 'Marked <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  as <span class="badge badge-success"><i class="fas fa-check"></i> active </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          }
          else if ($word[1] == 3) {
            echo 'Marked <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span> registration <span class="badge badge-success"><i class="fas fa-check-double"></i> approved </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          }   else if ($word[1] == 4) {
            echo 'Marked <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span> registration <span class="badge badge-warning"><i class="fas fa-spinner"></i> declined and requested new ID </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          }
          else if ($word[1] == 5) {
            if ($data['USER_TYPE'] == 1) {
            echo 'Created New <small class="badge badge-warning">Police</small> Account with a rank of <small class="badge badge-warning">'.$rank.'</small> on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          }else if($data['USER_TYPE'] == 2){
            echo 'Created New <small class="badge badge-primary">'.$userlevel.'</small> Account on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          }else{
            echo 'Created New <small class="badge badge-secondary">'.$userlevel.'</small> Account on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
          
          }
        }
          else if ($word[1] == 2) {
            if ($data['USER_TYPE'] == 1) {
            echo 'Changed <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  into <span class="badge badge-warning"> '. $rank.' </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
            }else if($data['USER_TYPE'] == 2){
              echo 'Changed <span class="badge badge-primary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  into <span class="badge badge-primary"> '. $userlevel.' </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
            }else{
              echo 'Changed <span class="badge badge-secondary"><i class="fas fa-user"></i> ' . $word[0] . '</span>  into <span class="badge badge-secondary"> '. $userlevel.' </span>  on <small class="badge badge-secondary"><i class="far fa-clock"></i> ' . date('g:i a', strtotime($data['TIME'])) . '</small><br>';
            
            }
          }
        }
    

    echo '</div>
      </div>
    </div>
 ';
  }
  $pastDate = date('Y/m/d', strtotime($data['DATETIME_EDITED']));
}



?>