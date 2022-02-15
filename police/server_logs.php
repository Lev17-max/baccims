
<?php  

include 'connection.php';
    $query = $connect->prepare("SELECT *,GROUP_CONCAT( log.BLOTTER_ENTRY_NUMBER ,'=', log.STATUS ) as RECORDS, TIME(DATETIME_EDITED) as TIME  FROM `record_logs` log  
                                JOIN `police` p ON log.USER_DETAILS_ID = p.USER_DETAILS_ID 
                                JOIN user_details ud ON log.USER_DETAILS_ID = ud.ID
                                JOIN police_rank prk ON p.POLICE_RANK_ID = prk.ID 
                                GROUP BY p.USER_DETAILS_ID,YEAR(DATETIME_EDITED),MONTH(DATETIME_EDITED),DAY(DATETIME_EDITED),TIME(DATETIME_EDITED) ORDER BY DATETIME_EDITED DESC ;");
    $query->execute();
    $result = $query->fetchAll();

    $pastDate = '';
 foreach ($result as $data) {


     // code...
          if(date('Y/m/d', strtotime($data['DATETIME_EDITED'])) != $pastDate){
              if(date('d', strtotime($data['DATETIME_EDITED'])) % 2 == 0){
                  echo '
                  <!-- timeline time label -->
                       
                       <div class="time-label">
                         <span class="bg-red">'. date('F d,Y', strtotime($data['DATETIME_EDITED'])).'</span>
                       </div>
                       ';

              }else{
                 echo '
                  <!-- timeline time label -->
                       
                       <div class="time-label">
                         <span class="bg-green">'. date('F d,Y', strtotime($data['DATETIME_EDITED'])).'</span>
                       </div>
                       ';
              }


           

        
                echo ' 
                       <!-- timeline item -->
                       <div>
                         <i class="fas fa-clock bg-blue"></i>
                         <div class="timeline-item">
                        
                           <h1 class="timeline-header"><a style="font-size: 20px; " href="#">'.ucfirst($data['FIRST_NAME']).' '.ucfirst($data['LAST_NAME']).' </a> <br> '.$data['NAME'].'</h1>
                        
                           <div class="timeline-body">';

                          $str = explode("," ,$data['RECORDS']);
                          foreach ($str as $key => $value) {
                              $word = explode("=",$value);

                              if($word[1] == 1){
                                echo 'Marked <span class="badge badge-primary"><i class="fas fa-file"></i> ' .$word[0].'</span>  as <span class="badge badge-success"><i class="fas fa-check-circle"></i> Solved</span> on <small class="badge badge-secondary"><i class="far fa-clock"></i> '.date('g:i a', strtotime($data['TIME'])) .'</small><br>';
                            }else if($word[1] == 0){
                                echo 'Marked  <span class="badge badge-primary"><i class="fas fa-file"></i> ' .$word[0].'</span> as <span class="badge badge-danger"><i class="fas fa-file"></i> Filed</span> on <small class="badge badge-secondary"><i class="far fa-clock"></i> '.date('g:i a', strtotime($data['TIME'])) .'</small><br>';
                              }else{
                               echo '<span class="badge badge-secondary"><i class="fas fa-pen"></i> Modified </span>  <span class="badge badge-primary"><i class="fas fa-file"></i> ' .$word[0].'</span> on <small class="badge badge-secondary"><i class="far fa-clock"></i> '.date('g:i a', strtotime($data['TIME'])) .'</small><br>';

                              }
                          }

                           
                           echo '</div>
                         </div>
                       </div>
                    ';
            
        
                

             }



                else{
                    echo ' 
                       <!-- timeline item -->
                       <div>
                         <i class="fas fa-clock bg-grey"></i>
                         <div class="timeline-item">
                        
                           <h1 class="timeline-header"><a style="font-size: 20px; " href="#">'.ucfirst($data['FIRST_NAME']).' '.ucfirst($data['LAST_NAME']).' </a> <br> '.$data['NAME'].'</h1>
                        
                           <div class="timeline-body">';

                          $str = explode("," ,$data['RECORDS']);
                          foreach ($str as $key => $value) {
                              $word = explode("=",$value);

                              if($word[1] == 1){
                                echo 'Marked <span class="badge badge-primary"><i class="fas fa-file"></i> ' .$word[0].'</span>  as <span class="badge badge-success"><i class="fas fa-check-circle"></i> Solved</span> on <small class="badge badge-secondary"><i class="far fa-clock"></i> '.date('g:i a', strtotime($data['TIME'])) .'</small><br>';
                            }else if($word[1] == 0){
                                echo 'Marked  <span class="badge badge-primary"><i class="fas fa-file"></i> ' .$word[0].'</span> as <span class="badge badge-danger"><i class="fas fa-file"></i> Filed</span> on <small class="badge badge-secondary"><i class="far fa-clock"></i> '.date('g:i a', strtotime($data['TIME'])) .'</small><br>';
                              }else{
                               echo '<span class="badge badge-secondary"><i class="fas fa-pen"></i> Modified </span>  <span class="badge badge-primary"><i class="fas fa-file"></i> ' .$word[0].'</span> on <small class="badge badge-secondary"><i class="far fa-clock"></i> '.date('g:i a', strtotime($data['TIME'])) .'</small><br>';

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