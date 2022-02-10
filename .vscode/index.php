<!DOCTYPE html>
<?php
session_start();
session_destroy();
session_start();
?>

<!-- prevent uneccesarry login -->
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php include 'head.php'; ?>
    <title>BACCIMS Login</title>
    <link rel="stylesheet" href="dist/css/login.css">
</head>

<body class="hold-transition login-page" style="background: -webkit-linear-gradient(left,  #01579B, #00c6ff)">
    <div class="login-box">
        <div id='login-back-paper' class='card'>
        </div>
        <div class='card'>
            <div class="card-header text-center border-0">
                <a href="index.php" class="h1">
                    <b style="color: #01579B;">BACCIMS</b>
                    <!-- <img class="animation__shake" src="dist/img/STI.png" alt="STILogo" height="50" width="70"> -->
                </a>
                <p class="login-box-msg">Login your account</p>
            </div>
            <div class="card-body">
                <form action="login_script.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" id="login-username" class="form-control" name="user_login" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" onkeypress="capLock(event)"  id="login-password" class="form-control" name="user_pass" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="capslock-on d-none"><span class="d-flex justify-content-center"><i class="fas fa-exclamation-triangle mt-1 text-yellow"></i>&nbsp Capslock is On</span></div>

                    <br>
                    <br>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" id="login_btn" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="forgot-password-page.php">Forgot Password?</a>
                </p>
                <p class="mb-0">
                    <a href="register.php" class="text-center">Register Here</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <?php include 'scripts.php'; ?>
    <script src="dist/js/login.js"></script>
</body>
</html>