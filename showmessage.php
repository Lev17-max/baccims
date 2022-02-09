
<?php  

   include 'connection.php';
   	$query = $connect->prepare("SELECT M.MESSAGE AS MESSAGE,M.SUBJECT AS SUBJECT,M.DATE AS DATE,UD.FIRST_NAME AS FNAME,UD.LAST_NAME AS LNAME FROM message M INNER JOIN user_details UD ON UD.ID = M.SENDER_ID GROUP BY DATE DESC");
   	$query->execute();
    $result = $query->fetchAll();
    $pastDate = '';
    foreach ($result as $data) {
    	// code...
             if(date('Y/m/d', strtotime($data['DATE'])) != $pastDate){
             	if(date('d', strtotime($data['DATE'])) % 2 == 0){
             		echo '
             		<!-- timeline time label -->
			              
			              <div class="time-label">
			                <span class="bg-red">'. date('F d,Y', strtotime($data['DATE'])).'</span>
			              </div>
			              ';

             	}else{
                    echo '
             		<!-- timeline time label -->
			              
			              <div class="time-label">
			                <span class="bg-green">'. date('F d,Y', strtotime($data['DATE'])).'</span>
			              </div>
			              ';
             	}
			   echo '
			            
			              <!-- timeline item -->
			              <div>
			                <i class="fas fa-envelope bg-blue"></i>
			                <div class="timeline-item">
			                  <span class="time"><i class="fas fa-clock"></i> '.date('g:i a', strtotime($data['DATE'])).'</span>
			                  <h3 class="timeline-header"><a href="#">'.ucfirst($data['FNAME']).' '.ucfirst($data['LNAME']).' </a></h3>

			                  <div class="timeline-body">
			                   <p>Subject: '.$data['SUBJECT'].'<br>
			                   Message: '.$data['MESSAGE'].'</p>
			                  </div>
			                </div>
			              </div>



			              <!-- END timeline item -->
			              <!-- timeline item -->
			           ';
			          



			       }
			       else{
			       	echo '<!-- timeline time label -->
			       	 <div>
			                <i class="fas fa-envelope bg-blue"></i>
			                <div class="timeline-item">
			                  <span class="time"><i class="fas fa-clock"></i> '.date('g:i a', strtotime($data['DATE'])).'</span>
			                  <h3 class="timeline-header"><a href="#">'.ucfirst($data['FNAME']).' '.ucfirst($data['LNAME']).' </a></h3>

			                  <div class="timeline-body">
			                   <p>Subject: '.$data['SUBJECT'].'<br>
			                   Message: '.$data['MESSAGE'].'</p>
			                  </div>
			                </div>
			              </div>
			              <!-- END timeline item -->
			              <!-- timeline item -->
			              ';
			       } 
			       $pastDate = date('Y/m/d', strtotime($data['DATE']));
			         }
        


?>