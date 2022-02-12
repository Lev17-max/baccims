
<?php include 'connection.php';
$query = '';
if (isset($_SESSION['USER_ID'])) {
    $id = $_SESSION['USER_ID'];
    $accs = $_SESSION['ACCESS_LEVEL'];
} else {
    $id = $_POST['id'];
    $accs = $_POST['accs'];
}
if ($accs == 3) {
    $query = $connect->prepare("SELECT * FROM user U JOIN (SELECT * FROM user_details) UD ON UD.ID = U.USER_DETAILS_ID WHERE ACCESS_LEVEL <= 3 && U.ID != :id AND VERIFIED !=4
    ORDER BY VERIFIED DESC");
} else {
    $query = $connect->prepare("SELECT * FROM user U JOIN (SELECT * FROM user_details) UD ON UD.ID = U.USER_DETAILS_ID WHERE ACCESS_LEVEL <=2 && U.ID != :id AND VERIFIED !=4
    ORDER BY VERIFIED DESC");
}

$query->bindParam(':id', $id);
$query->execute();
$disp = $query->fetchAll();

$qry = $connect -> prepare('Select * from `user_logs` where `USER_ID` = ?');
$qry2 = $connect -> prepare('Select * from `user_details` where ID = ?');


$counts = 0;
foreach ($disp as $row) {

    $qry -> bindParam(1, $row['USER_DETAILS_ID']);
    $qry -> execute();
    $qdata = $qry->fetchAll();


    $counts += 1;
    $str = ucfirst(strtolower($row['FIRST_NAME'])) . ' ' . substr(ucfirst(strtolower($row['MIDDLE_NAME'])), 0, 1) . ' ' . ucfirst(strtolower($row['LAST_NAME']));


    if ($row["ACCESS_LEVEL"] == 2) {
        $lvls = '<span class="badge badge-primary">barangay official </span> ';
    } else if ($row["ACCESS_LEVEL"] == 1) {
        $lvls = '<span class="badge badge-warning">police </span> ';
    } else if ($row["ACCESS_LEVEL"] == 3) {
        $lvls = '<span class="badge badge-info">admin </span> ';
    } else {
        $lvls = '<span class="badge badge-secondary">user</span> ';
    }
    if ($row["VERIFIED"] == 1) {
        $verified = '<span class="badge badge-success"><i class="fas fa-check"></i> verified </span>';
    } else if ($row["VERIFIED"] == 2) {
        $verified = '<span class="badge badge-warning"><i class="fas fa-spinner fa-spin"></i> request pending </span>';
    } else if ($row["VERIFIED"] == 3) {
        $verified = '<span class="badge badge-info"><i class="fas fa-spinner fa-spin"></i> needs approval </span>';
    }else{
        
         $verified = '<span class="badge badge-warning"><i class="fas fa-spinner fa-spin"></i> unverified </span>';
    }
    if ($row["STATUS"] == 0) {
        $status = '<span class="badge badge-success"><i class="fas fa-check"></i> active </span> ';
        // $btn =  '<a id="btn" onclick="archive(' . $row['ID'] . ',\'' . ucfirst(strtolower($row['FIRST_NAME'])) . '\',' . $row['ACCESS_LEVEL'] . ',0)" class="btn btn-danger btn-sm" href="#">
        //         <i class="fas fa-trash">
        //         </i> <br>
        //         Archive
        //         </a>';
    }else if ($row["STATUS"] == 2) {
        $status = '<span class="badge badge-info"><i class="fas fa-sync fa-spin"></i> Reseting Password</span> ';
        // $btn =  '<a id="btn" onclick="archive(' . $row['ID'] . ',\'' . ucfirst(strtolower($row['FIRST_NAME'])) . '\',' . $row['ACCESS_LEVEL'] . ',0)" class="btn btn-danger btn-sm" href="#">
        //         <i class="fas fa-trash">
        //         </i> <br>
        //         Archive
        //         </a>';
    } else {
        
        $status = '<span class="badge badge-danger"><i class="fas fa-ban"></i> archived </span>';
        $btn =  '<a id="btn" onclick="archive(' . $row['ID'] . ',\'' . ucfirst(strtolower($row['FIRST_NAME'])) . '\',' . $row['ACCESS_LEVEL'] . ',1)" class="btn btn-success btn-sm" href="#">
        <i class="fas fa-check-double">
        </i>
        <br>
         Activate
        </a>';
    }

    if ($accs == 3) {
        echo '
            <tr>
                <td class="font-weight-bold" >
                    ' . $counts . '
                    <input type="hidden" class="id-hidden d-none" value="' . $row['ID'] . '" >
                </td>
                <td class="font-weight-bold" >
                    <a>
                       ' . $str . '
                    </a>
                    ';  
                    
                     
                    foreach ($qdata as $keys) {

                        $qry2 -> bindParam(1, $keys['USER_DETAILS_ID']);
                        $qry2 -> execute();
                        $qrydata = $qry2->fetchAll();
    
                        foreach ($qrydata as $value) {
    
                            echo '<br><small class="text-muted m-0 pt-0" style="
                                    font-size: 10px;
                                " disabled>';
                            if ($keys['STATUS'] == 0) {
                                echo 'Marked as  ' . $status . ' by '.ucfirst(strtolower($value['LAST_NAME'])) .'<br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            } else if ($keys['STATUS'] == 1) {
                                echo 'Marked as  ' . $status . ' by '.ucfirst(strtolower($value['LAST_NAME'])) .'<br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            } else if ($keys['STATUS'] == 2) {
                                echo '<span class="badge badge-secondary"><i class="fas fa-pen"></i> User Type Changed </span>  by '.ucfirst(strtolower($value['LAST_NAME'])) .'<br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            }else if ($keys['STATUS'] == 3) {
                                echo  '<span class="badge badge-success"><i class="fas fa-check"></i> Registration Approved </span> by '.ucfirst(strtolower($value['LAST_NAME'])) .'<br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            }else if ($keys['STATUS'] == 4) {
                                echo ucfirst(strtolower($value['LAST_NAME'])) . ' <span class="badge badge-warning"><i class="fas fa-spinner fa-spin"></i> requested another id </span>  <br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            }
    
                            echo '</small></td>';
                        }
                    }
                  

        echo '
                </td>
                <td class="font-weight-bold" >
                    ' . $lvls . '
                </td>
                <td >
                    ' . $status . '
                </td>
                <td class="project-actions text-right">
                <button class="btn btn-app bg-secondary options" onclick="submitID(' . $row['ID'] . ')" >
                    <i class="fas fa-cog"></i> options
                </button>
                </td>
            </tr>
';
    } else {
        echo '
            <tr>
                <td class="font-weight-bold" >
                    ' . $counts . '
                </td>
                <td class="font-weight-bold" >
                    <a>
                       ' . $str ;
                        
                     
                    foreach ($qdata as $keys) {

                        $qry2 -> bindParam(1, $keys['USER_DETAILS_ID']);
                        $qry2 -> execute();
                        $qrydata = $qry2->fetchAll();
    
                        foreach ($qrydata as $value) {
    
                            echo '<br><small class="text-muted m-0 pt-0" style="
                                    font-size: 10px;
                                " disabled>';
                            if ($keys['STATUS'] == 0) {
                                echo 'Marked as  ' . $status . ' by '.ucfirst(strtolower($value['LAST_NAME'])) .'<br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            } else if ($keys['STATUS'] == 1) {
                                echo 'Marked as  ' . $status . ' by '.ucfirst(strtolower($value['LAST_NAME'])) .'<br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            } else if ($keys['STATUS'] == 2) {
                                echo '<span class="badge badge-secondary"></i> User Type Changed </span>  by '.ucfirst(strtolower($value['LAST_NAME'])) .'<br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            }else if ($keys['STATUS'] == 3) {
                                echo  '<span class="badge badge-success"><i class="fas fa-check"></i> Registration Approved </span> by '.ucfirst(strtolower($value['LAST_NAME'])) .'<br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            }else if ($keys['STATUS'] == 4) {
                                echo ucfirst(strtolower($value['LAST_NAME'])) . ' <span class="badge badge-warning"><i class="fas fa-spinner fa-spin"></i> requested another id </span>  <br> on ' . date('F d, Y g:i a', strtotime($keys['DATETIME_EDITED']));
                            }
    
                            echo '</small></td>';
                        }
                    }
                  


                echo '
                    </a>
                    <br/>
                </td>
                <td class="font-weight-bold" >
                    ' . $lvls . '


                </td>
                <td class="font-weight-bold" >
                    <div class="card m-0">
                        <div class="card-body p-0" data-toggle="lightbox" href="' . $row['FRONT_ID'] . '" data-gallery="' . $str . '-gallery" data-type="image" >
                            <center> <img width="80" height="80" src="' . $row['FRONT_ID'] . '"> </center>
                        </div>
                    </div>

                </td>
                <td class="font-weight-bold" >

                    <div class="card m-0">
                        <div class="card-body p-0" data-toggle="lightbox" href="' . $row['BACK_ID'] . '" data-gallery="' . $str . '-gallery" data-type="image" >
                            <center> <img width="80" height="80" src="' . $row['BACK_ID'] . '"> </center>
                        </div>
                    </div>

                </td>
                <td >
                    ' . $status . '
                </td>
                <td class="font-weight-bold" >
                    ' . $verified . '
                </td>
                <td class="project-actions text-right">
                <button class="btn btn-app bg-secondary options" onclick="submitID(' . $row['ID'] . ')" >
                    <i class="fas fa-cog"></i> options
                </button>
                </td>
            </tr>
';
    }
} ?>