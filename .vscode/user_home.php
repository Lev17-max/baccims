<!DOCTYPE html>
<?php include 'session_file.php';
date_default_timezone_set('Asia/Manila'); ?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Page</title>

    <?php include 'head.php'; ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark">
            <div class="container">
                <a class="navbar-brand">
                    <img src="dist/img/BACCIMS.png" alt="BACCIMS" class="brand-image">
                   BACCIMS
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" id="sidebar-info-board" class="nav-link pe-auto">Info Board</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="sidebar-map" class="nav-link pe-auto">Crime Map</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="sidebar-help" class="nav-link pe-auto">Help</a>
                        </li>

                    </ul>

                    <!-- SEARCH FORM -->

                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item">
                        <div class="user-panel d-flex">
                            <div class="image">
                               
                               <img src="<?php echo $_SESSION['ICON']; ?>" class="img-circle mb-0 mt-1 border-1" alt="User Image">
                                
                                
                            </div>
                            <div class="nav-item">
                                <a href="#"  data-toggle="modal" role="button" data-target="#profile" class="nav-link"><?php echo '<p>' . $_SESSION["USERNAME"] . '</p>' ?></a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="logout" href="logout.php">
                            <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> Logout
                        </a>

                    </li>

                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 id="name" class="m-0 name">Info Board</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li id="name2" class="breadcrumb-item active name">Info board</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container ">

                    <!-- end of dashboard -->
                    <!-- start of reports -->


                    <?php 
                            include 'help.php';
                            include 'infoboard.php';
                          include 'map.php';
                           
                           ?>
                    

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include 'footer.php'; ?>
    </div>
    <!-- ./wrapper -->



 
    <?php include 'scripts.php';
      include 'show-map-user.php'; ?>

      <script>



      </script>

     <?php  include 'end.php'; ?>

  
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsjaYpcqQsuXso2ZmNYIWvhm7Pnr9h-tU"></script>
    

     <div id="profile" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header mb-0 border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="card border-0">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo $_SESSION['ICON']; ?>" alt="User profile picture">
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
<script>
    function editnumber(phonenum) {


    
Swal.fire({
            title: 'Edit Mobile Number',
            html:
                '<div class="col-lg-12">'+
                '<div class="input-group form-group " style="position: relative;">'+
                    '<input type="tel" id="upphone" class="form-control phone-a phone input-item-a input-item-a-mobile-num" name="item-a-mobile-phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="" required>'+
                    '<span class="countrycode3" >'+
                        '+63 &nbsp</span>'+
                    '<div class=" phone-icon input-group-append">'+
                        '<div class="input-group-text">'+
                            '<span class="fas fa-phone"></span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
           '</div>',
            focusConfirm: false,
            width: '350px',
            customClass: {
                container: 'overflow-hidden',

            },
            showCancelButton: true,
            preConfirm: (value) => {




              let num = document.getElementById('upphone').value;
              if(num){

                Swal.fire({
                title: 'Confirm Number?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "Blue",
                confirmButtonText: "Confirm!",
                closeOnConfirm: false
            }).then((result) => {


                  $.ajax({
                      type: "POST",
                      url: "update-number.php",
                      data: {
                          id : <?php echo $id ?>,
                          phone: num,
                      },
                      success: function (res) {

                        if(res == 204){
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Updated Successfully!',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $('#phone-holder').load('show_number.php',{
                                            id : <?php echo $id ?>
                                        });
                                    }
                                });
                        }else{
                                    Swal.fire({
                                    icon: 'Error',
                                    text: 'Updated Failed!',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                       
                                        $('#phone-holder').load('show_number.php',{
                                            id : <?php echo $id ?>
                                        });
                                    }
                                });

                                }

                          
                      }
                  });


     
                });
                }else {
                    Swal.showValidationMessage(
                        'input data on all fields'
                    )
                }
                
            },
        });




}
</script>

</body>

</html>