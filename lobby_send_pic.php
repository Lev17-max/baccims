<!DOCTYPE html>


<!-- prevent uneccesarry login -->

<?php session_start();
if (!isset($_SESSION['FIRST_NAME']) && !isset($_SESSION['LAST_NAME']) && !isset($_SESSION['YOUR_NAME']) && !isset($_SESSION['USER_ID'])) {
  unset($_SESSION['LAST_NAME'],$_SESSION['FIRST_NAME'],$_SESSION['YOUR_NAME'],$_SESSION['last_login_timestamp'],$_SESSION['USER_ID']);
  header("location:index.php?unauthorized");
}
?>

<!-- end  -->

<html lang="en">

<head>


  <!-- include all scripts and styles -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <?php include 'head.php' ?>

  <!-- end -->


</head>

<body class="hold-transition login-page" style="background: -webkit-linear-gradient(left,  #01579B, #00c6ff)">

  <div class="login-box bg-light">

    <!-- /.login-logo -->
   

    <div class="card-header text-center border-0">
      <a href="index.php" class="h1"><b>CISTICO</b> <img class="animation__shake" src="dist/img/STI.png" alt="STILogo" height="50" width="70"></a>
    </div>
    <div class="card-body">
      <form method="POST" action="update_id.php" enctype="multipart/form-data">
     
              <br>
              <label>Verification ID's</label>
              <br>
              <div class="row">
                <div class="col-lg-12 col-12">
                  <div class="row">
                    <div class="col-lg-12 col-12">
                      <label>Front:</label>

                      <input type="file" accept=".jpg,.png" name="frontID" onchange="readURL(this,1)" class="form-control" id="exampleInputFile1" required>

                        <br>
                      <a id="image-holder1" data-toggle="lightbox" data-title="Preview Front" data-gallery="gallery">
                        <center> <button id="id-show1" class="badge badge-pill badge-info d-none "> Preview</button> </center>
                      </a>

                    </div>
                    <div class="col-lg-12 col-12">
                      <label>Back:</label>

                      <input type="file" accept=".jpg,.png" name="backID" onchange="readURL(this,2)" class="form-control" id="exampleInputFile2" required>
                      <br>
                      <a id="image-holder2" data-toggle="lightbox" data-title="Preview Back" data-gallery="gallery">
                        <center> <button id="id-show2" class="badge badge-pill badge-info d-none "> Preview</button> </center>
                      </a>

                    </div>
                  </div>
                  <div class="col-lg-12">
                    <br>
                    <br>
                    <p> * The only following Goverment ID's that is <br>accepted is listed bellow, other is rejected.
                      <br>ID'S:
                      <br>PhilSysy or National ID
                      <br>Philheath ID
                      <br>Voter's ID
                    </p>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="terms" id="customCheckbox1" value="agree" required>
                      <label for="customCheckbox1" class="custom-control-label">I agree to CISTICO <a href="">Terms of Service<br> and Privacy Security</a></label>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-4 ">

                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>

            </div> <!-- end column  -->

      <div class="text-center">
        <a href="logout.php">Sign in as a different user</a>
      </div>

      <div class="lockscreen-footer text-center">
        <h6>Copyright &copy; 2021-2022 <b><a href="index.php" class="text-black">BACCIMS</a></b><br>
          All rights reserved</h6>
      </div>


    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <?php include 'scripts.php';
  include 'register_script_function.php'; ?>
</body>

</html>