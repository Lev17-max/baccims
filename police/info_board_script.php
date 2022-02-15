<?php
    include 'connection.php';
    //variables
     if(!isset($_SESSION['ACCESS_LEVEL'])){
          session_start();
     }

    $icon = "";
    $current = new \DateTime('now');

    $query = $connect->prepare("SELECT I.ID,I.STATUS,I.DETAILS AS MESSAGE,I.DATE_POSTED AS DATE,I.IMAGES AS IMAGE,UD.FIRST_NAME,UD.MIDDLE_NAME,UD.LAST_NAME,UD.GENDER,U.ACCESS_LEVEL FROM info_board I LEFT JOIN user_details UD ON I.SENDER_ID = UD.ID LEFT JOIN user U ON U.USER_DETAILS_ID = UD.ID ORDER BY DATE DESC;");
    $query->execute();
    $result = $query->fetchAll();

    foreach ($result as $data) {
        $counter = 0;
        $counter_2 = 0;
        $btns = '';
        $statusi = '';
     if($_SESSION['ACCESS_LEVEL'] > 0){
        if($data['STATUS'] != 0){
             $statusi = ' 
             <div class="ribbon-wrapper">
                 <div class="ribbon bg-danger">
                 Archived
                 </div>
            </div>';
             $btns = '<i class="fas fa-edit"></i> Retrieve Post &nbsp &nbsp &nbsp ';
        }else{
            $statusi = ' 
            <div class="ribbon-wrapper">
                <div class="ribbon bg-success">
                  Posted
                </div>
           </div>';
            $btns = '<i class="fas fa-trash"></i> Archive Post &nbsp &nbsp &nbsp ';

            }
        }
        if ($data['ACCESS_LEVEL'] == 0) {
            if ($data['GENDER'] == 'Male') {
                $icon= '../dist/img/user_level/user.png';
            } else {
                $icon = '../dist/img/user_level/user-fmale';
            }
        }
        if($data['ACCESS_LEVEL'] == 1){
            $icon = '../dist/img/user_level/police.png';
        }
        else if ($data['ACCESS_LEVEL'] == 2) {
            if ($data['GENDER'] == 'Male') {
                $icon = '../dist/img/user_level/barangay.png';
            } else {
                $icon = '../dist/img/user_level/fmale-barangay.png';
            }
        }
        else {
            $icon= '../dist/img/user_level/admin.png';
        }
        // time
        $str = ucfirst(strtolower($data['FIRST_NAME'])) . ' ' . substr(ucfirst(strtolower($data['MIDDLE_NAME'])), 0, 1) . ' ' . ucfirst(strtolower($data['LAST_NAME']));
        $time =  new \DateTime(date('Y-m-d H:i:s', strtotime($data['DATE'])));
        $Diff = $time->diff($current);
        $hours = $Diff->format('%h');
        $mins = $Diff->format('%i');
        $secs = $Diff->format('%s');
        //time

        if($_SESSION['ACCESS_LEVEL'] == 0 && $data['STATUS'] == 1){ 

        }else{
        echo '<div class="post " >

                    <div class="card ">
                
                                <div class="card-header border-0" >
                                <a role="button"  onClick="delPost('.$data['ID'].','.$data['STATUS'].')" class="update_infob text-secondary float-right mt-0"> '.$btns.'</a>
                                </div>
          
                        <div class="card-body">
         
                            <div class="user-block">
                          '.$statusi.'
                                
                    <img class="img-circle img-bordered-sm" src="' . $icon . '" alt="user image">
                    <span class="username">
                    <a href="#">' . $str . '</a>
                    </span>
                    <span class="description"> Posted on ' . date('F d, Y g:i a', strtotime($data['DATE'])) . '</span>
                
                        
                </div>
            <p>' . $data['MESSAGE'] . '</p>';

        echo '  <div class="row mb-3">';
        if ($data['IMAGE'] != null) {
            $start = '';
            $end = '';
            $image = explode(":", $data['IMAGE']);

            if (count($image) - 1 > 1) {
                $start = '<div class="card col-sm-6">';
                $end = '  </div>';
            }
            foreach ($image as $i => $key) {
                if ($key != '' && count($image) - 1 > 1) {
                    
                    if($i == 1){
                        echo '
                        <div class="card col-sm-6 ">
                            <img data-height="600" data-max-width="600" class="img-fluid" src="../' . $key . '"  href="../' . $key . '" data-toggle="lightbox" data-gallery="' . $str . date('F d, Y g:i a', strtotime($data['DATE'])) . '-gallery" data-type="image" >
                        </div> 
                        ';
                        echo $start;
                    }else if((count($image) - 1) == $i){
                        echo $end; 
                    }else if($i > 3){
                        echo '
                        <img data-height="600" data-max-width="600" class="img-fluid d-none" src="../' . $key . '"  href="../' . $key . '" data-toggle="lightbox" data-gallery="' . $str . date('F d, Y g:i a', strtotime($data['DATE'])) . '-gallery" data-type="image" >
                         ';  
                    }else{
                        echo '
                        <img data-height="600" data-max-width="600" class="img-fluid" src="../' . $key . '"  href="../' . $key . '" data-toggle="lightbox" data-gallery="' . $str . date('F d, Y g:i a', strtotime($data['DATE'])) . '-gallery" data-type="image" >
                         ';
                    }

                }else if($key != '' && count($image) - 1 == 1){
                    echo '
                        <div class="card col-sm-6 ">
                            <img data-height="600" data-max-width="600" class="img-fluid" src="../' . $key . '"  href="../' . $key . '" data-toggle="lightbox" data-gallery="' . $str . date('F d, Y g:i a', strtotime($data['DATE'])) . '-gallery" data-type="image" >
                        </div> 
                        ';
                }

              
           }
            
        }
        echo '  </div>
        </div>
        </div>
          </div>';
    }
}
