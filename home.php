<!DOCTYPE html>
<!--call session for login -->


<?php include 'session_file.php';

date_default_timezone_set('Asia/Manila'); ?>
<!-- session end -->
<html lang="en">

<head>
    <!-- call scripts and styles -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BACCIMS Home</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
    <?php include 'head.php'; ?>
    <!-- end call scripts -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center bg-blue">
            <img class="animation__shake" src="dist/img/BACCIMS.png" alt="BACCIMS" height="160" width="160">
        </div>

        <?php include 'navbar.php';
        include 'session_level.php';
        ?>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <?php include 'footer.php';
    include 'scripts.php';  ?>


    <div id="profile" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header mb-0 border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="card border-0">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo $icon; ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?php echo $name ?></h3>
                        <p class="text-muted text-center"><?php echo $levelLabel ?></p>


           
        
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Mobile Number:</b> 
                                <a onclick="editnumber(<?php echo $id ?>)" class="float-right"><i class="fas fa-pen fa-sm"></i>
                                 </a>
                                <span id="phone-holder" class="float-right">
                              <?php include 'show_number.php'; ?>
                               &nbsp </span>
                         
                            </li>
                            <!-- <li class="list-group-item">
                                <b>Email:</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>



       

              
            <?php
                include 'home_scripts.php';
         
            include 'home-check-inactive.php';
            include 'show_map.php';
            include 'end.php'; ?>
         

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsjaYpcqQsuXso2ZmNYIWvhm7Pnr9h-tU"></script>
</body>

</html>