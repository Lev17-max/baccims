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
            <img class="animation__shake" src="../dist/img/BACCIMS.png" alt="BACCIMS" height="160" width="160">
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

<!-- 
            <script src="../dist/js/home.js"></script> -->

            <?php
            if ($_SESSION['ACCESS_LEVEL'] > 0) { ?>

                <div id="adduser" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header mb-0 border-0">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <!-- start -->
                            <!-- body -->
                            <div class="card-body pt-0">
                                <form method="POST" action="adduserfromtable.php">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- first name & last name -->
                                            <!-- first name & last name end -->
                                            <!-- birthday and the rest -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="hidden" class="d-none" name="admin_sender" value="<?php echo $_SESSION['USER_ID'];  ?>">
                                                    <label> Username:</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id= "username-add" class="form-control" name="username" placeholder="Username" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label> Password:</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-lock"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label> User Type:</label><br>
                                                    <div class="input-group mb-3">
                                                        <select id="usertype" name="type" class="custom-select rounded-0" id="exampleSelectRounded0" required>
                                                            <option value="0" selected>Resident User</option>
                                                            <option value="1" >Police</option>
                                                            <option value="2">Barangay Official</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-exclamation-circle"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="police_list" class="d-none">
                                                    <label> Police Rank:</label><br>
                                                    <div class="input-group mb-3">
                                                        <select id="rank" name="rank" class="custom-select rounded-0" id="exampleSelectRounded0" required>
                                                            <option value="" disabled selected>Police Rank</option>
                                                        <?php
                                                             include 'list_police.php';
                                                        ?>
                                                           
                                                        </select>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-exclamation-circle"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <button type="submit" id="submit_user" class="btn btn-primary btn-block">Create Account</button>
                                            </div> <!-- end column  -->
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- end -->
                        </div>
                    </div>

                </div>

                <div id="addPlace" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="addPlace.php">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="prk-hidden" name="prkid">
                                    <input type="hidden" id="ph-hidden" name="phid">
                                    <input type="hidden" id="brgy-hidden" name="brgyid">

                                    <div class="input-group mb-3">
                                        <input type="number" title="Latitude starts at 10." step="0.00001" min="10.5800" max="10.6800" class="form-control" name="lat" placeholder="Latitude" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-map"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" title="Longitude starts at 122." step="0.00001" min="122.95732" max="122.97170" class="form-control" name="long" placeholder="Longitude" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-map"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php include 'retrive_place.php'; ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                Phase
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($data1 as $val) {
                                                    echo '<li value="' . $val['ID'] . '" class="dropdown-item item-phase">' . $val['PHASE'] . '</li>';
                                                } ?>
                                            </ul>
                                        </div>
                                        <input type="text" class="form-control" id="phase-input" name="phase" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                Purok
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($data2 as $val) {
                                                    echo '<li value="' . $val['ID'] . '" class="dropdown-item item-purok">' . $val['PUROK'] . '</li>';
                                                } ?>
                                            </ul>
                                        </div>
                                        <input type="text" class="form-control" id="purok-input" name="purok" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                Barangay
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($data3 as $val) {
                                                    echo '<li value="' . $val['ID'] . '" class="dropdown-item item-brgy">' . $val['BARANGAY'] . '</li>';
                                                } ?>
                                            </ul>
                                        </div>
                                        <input type="text" class="form-control" id="brgy-input" name="brgy" required>
                                    </div>
                                    <input class="btn btn-primary" id="addplacebtn" type="submit" value="Submit">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>





            <?php
                include 'home_scripts.php';
            }
            include 'home-check-inactive.php';
            include 'show_map.php';
            include 'end.php'; ?>
            <script>
                $(document).ready(function () {

                    $('#usertype').change(function (e) { 
                        if($(this).val()==1){
                            $('#police_list').removeClass('d-none');
                        }else{
                            $('#police_list').addClass('d-none');
                        }
                    });

                    $('#username-add').keyup(function (e) { 

                                    if(this.value.length > 4){
                                    $.ajax({
                                        type: "POST",
                                        url: "search_username.php",
                                        data: {
                                            username : $(this).val(),
                                        },
                                        success: function (response) {
                                            if(response == 204){
                                                $('#username-add').addClass('is-invalid');
                                                $('#username-add').removeClass('is-valid');

                                                $('#username-add').attr('title', 'Username is Taken');
                                            }else{
                                                $('#username-add').addClass('is-valid');
                                                $('#username-add').removeClass('is-invalid');
                                                $('#username-add').attr('title', 'Username is Available');
                                            }
                                            
                                        }
                                    });
                                    }else{
                                                $('#username-add').addClass('is-invalid');
                                                $('#username-add').removeClass('is-valid');

                                                $('#username-add').attr('title', 'Letters should be more than 4');

                                    }

                                    });
                });
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsjaYpcqQsuXso2ZmNYIWvhm7Pnr9h-tU"></script>
</body>

</html>