<!DOCTYPE html>
<html lang="en">
<?php session_start();
if (!isset($_SESSION['FIRST_NAME']) && !isset($_SESSION['LAST_NAME']) && !isset($_SESSION['YOUR_NAME']) && !isset($_SESSION['USER_ID'])) {
  unset($_SESSION['LAST_NAME'],$_SESSION['FIRST_NAME'],$_SESSION['YOUR_NAME'],$_SESSION['last_login_timestamp'],$_SESSION['USER_ID']);
  header("location:index.php?unauthorized");
}
?>

<head>
<meta http-equiv="refresh" content="900;url=logout.php" />

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <?php include 'head.php'; ?>
  <title>BACCIMS Register</title>
  <link rel="stylesheet" href="dist/css/register.css">

</head>

<body class="hold-transition register-page " style="background: -webkit-linear-gradient(left,  #01579B, #00c6ff); display: flex;">
  <div class="card mt-5">
    <!-- call card color -->

    <div class='card mb-0'>
      <div class="card-header text-center border-0">
        <a href="index.php" class="h1">
          <b style="color: #01579B;">BACCIMS</b>
          <!-- <img class="animation__shake" src="dist/img/STI.png" alt="STILogo" height="50" width="70"> -->
        </a>
        <p class="login-box-msg">Register</p>
      </div>
      <!-- body -->
      <div class="card-body pt-0">
        <form method="POST" action="register-personel.php" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" class="form-control" name="sesid" id="" value="<?php if(isset($_SESSION['USER_ID'])){echo $_SESSION['USER_ID'];}?>" placeholder="">
            </div>
          <div class="row">
            <div class="col-lg-6">
              <!-- first name & last name -->
              <br>
              <div class="row">
                <div class="col-lg-6">
                  <label> First Name:</label><br>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label> Middle Name:</label><br>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="middlename" placeholder="Middle Name" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <label> Last Name:</label><br>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label> Birth Date:</label><br>
                  <div class="input-group mb-3 date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" placeholder="Birth Date" name="birthday" data-target="#reservationdate" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text">
                        <span class="fas fa-calendar-alt"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- first name & last name end -->
              <!-- birthday and the rest -->
              <div class="row">
                <div class="col-lg-12">
                  <label> New Username:</label><br>

                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <label> New Password:</label><br>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <label>Address:</label><br>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-address-book"></span>
                      </div>
                    </div>
                  </div>
                  <label>Mobile:</label><br>
                  <div class="input-group " style="position: relative;">
                    <input type="tel" id="phone" class="form-control phone" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="" required>
                    <span id="countrycode">
                      (+63) </span>
                    <div id="phone-icon" class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                  </div>
                  <p class="mb-0 mt-2">
                    <a href="index.php" class="text-center">Already have an Account</a>
                  </p>
                </div>
              </div>

            </div>
            <div class="col-lg-6 pl-1 pr-0">
              <br>
              <label>Gender:</label>
              <div class="input-group mb-3">
                <div class="form-group">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Male" checked>
                    <label class="form-check-label">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" vaalue="Female" name="gender">
                    <label class="form-check-label">Female</label>
                  </div>
                </div>

              </div>
              <label>Verification ID's</label>
              <br>
              <div class="row">
                <div class="col-lg-12 col-12">
                  <div class="row">
                    <div class="col-lg-5 col-6">
                      <label>Front:</label>

                      <input type="file" accept=".jpg,.png" name="frontID" onchange="readURL(this,1)" class="form-control" id="exampleInputFile1" required>
                      <br>
                      <div class="row justify-content-center">
                        <div class="col-lg-4 p-0">
                          <div id="id-show1" class="card w-50 m-0 d-none">
                            <div id="image-holder1" class="card-body p-0 m-0" data-toggle="lightbox" data-gallery="front-id" data-type="image">
                              <center> <img id="Fimg" width="80" height="80"> </center>
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="col-lg-5 col-6">
                      <label>Back:</label>

                      <input type="file" accept=".jpg,.png" name="backID" onchange="readURL(this,2)" class="form-control" id="exampleInputFile2" required>
                      <br>
                      <div class="row justify-content-center">
                        <div class="col-lg-4 p-0">
                          <div id="id-show2" class="card w-50 m-0 d-none">
                            <div id="image-holder2" class="card-body p-0 m-0" data-toggle="lightbox" data-gallery="back-id" data-type="image">
                              <center> <img id="Bimg" width="80" height="80"> </center>
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="col-lg-12">
                    <br class="br">
                    <br>
                    
                    <p> * The only following Goverment ID's that is <br>accepted is listed bellow, other is rejected.
                      <br>ID'S:
                      <br>PhilSysy or National ID
                      <br>Philheath ID
                      <br>Voter's ID
                      <br>Drivers License
                    </p>
                    <br class="br">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="terms" id="customCheckbox1" value="agree" required>
                      <label for="customCheckbox1" class="custom-control-label">I confirm the information given above is true</a></label>
                    </div>
                    <br class="br">
                    <br >

                  </div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-4 ">

                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>

            </div> <!-- end column  -->




          </div>
        </form>

      </div>
    </div>

  </div>


  <?php include 'scripts.php';
  include 'register_script_function.php'; ?>
</body>

</html>