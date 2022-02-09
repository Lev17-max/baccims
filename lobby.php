<!DOCTYPE html>


<!-- prevent uneccesarry login -->

<?php session_start();
if (!isset($_SESSION['STATUS']) && !isset($_SESSION['YOUR_NAME']) && !isset($_SESSION['VERIFIED'])) {
  unset($_SESSION['STATUS'],$_SESSION['VERIFIED'],$_SESSION['YOUR_NAME'],$_SESSION['last_login_timestamp']);
  header("location:index.php?unauthorized");
}
?>

<!-- end  -->

<html lang="en">

<head>


  <!-- include all scripts and styles -->
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
      <div class="help-block text-center">
        <h4 class="login-box-msg">  Hi! <?php if (isset($_SESSION['YOUR_NAME'])) {
                                        echo $_SESSION['YOUR_NAME'];
                                      } ?></h4>
          
        <?php
         if (isset($_SESSION['STATUS'])){
           if ($_SESSION['STATUS'] == 1){
           echo 'Your Account is Archived!';
           }else{

          
           
          ?>
       
        <p>Your <?php if (isset($_SESSION['VERIFIED'])){
                                        if($_SESSION['VERIFIED'] == 3){
                                           echo 'ID';
                                        }else{
                                          echo 'Registration';
                                        }
                                      } ?> is being processed right now. A message will be sent to your number if registration is approved.</p>
      
                                   <?php }}?></div>
      <br>
      <!-- START LOCK SCREEN ITEM -->
      <!-- /.lockscreen-item -->

      <div class="text-center">
        <a href="logout.php">Sign in as a different user</a>
      </div>

      <div class="lockscreen-footer text-center">
        <h6>Copyright &copy; 2021-2022 <b><a href="index.php" class="text-black">BACCIMS</a></b><br>
          All rights reserved</h6>
      </div>




    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <?php include 'scripts.php'; ?>

</body>

</html>