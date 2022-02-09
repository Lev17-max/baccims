<!DOCTYPE html>
<html lang="en">

<head>

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
                <p class="login-box-msg">Change Password</p>
            </div>
            <!-- body -->
            <div class="card-body pt-0">
                <form method="POST" action="passcript.php" enctype="multipart/form-data">
                    <label> Username:</label><br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
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
                    <div class="form-group">
                        
                      <label for=""></label>
                      <input type="submit" id="resetpass" class="btn btn-primary col-lg-12" value="Submit" >
                      <p class="mb-0 mt-2">
                    <a href="index.php" class="text-center">Back to Login</a>
                  </p>
                      
                    </div>
                </form>

            </div>
        </div>

    </div>


    <?php include 'scripts.php';
    include 'register_script_function.php'; ?>
</body>

</html>