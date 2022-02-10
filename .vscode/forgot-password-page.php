<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php include 'head.php'; ?>
    <title>BACCIMS Register</title>
    <style>
        #phone {
            text-indent: 43px;
            margin-bottom: 1em;
        }

        #countrycode {
            position: absolute;
            left: 1em;
            top: 0;
            height: 100%;
            line-height: 37px;
            color: #a0a6ab;
            z-index: 12;
            user-select: none;
        }

        #phone-icon {
            position: relative;
            height: 38px;
        }
    </style>
</head>

<body class="hold-transition register-page " style="background: -webkit-linear-gradient(left,  #01579B, #00c6ff); display: flex;">
    <div class="card mt-5" style="width: 22rem;">
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
                <form method="POST" action="server-forgot-password.php">
                    <label> Username:</label><br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label>Mobile:</label><br>
                    <div class="input-group " style="position: relative;">
                        <input type="tel" id="phone" class="form-control" name="phone" title="Mobile Number Must Start from 9" pattern="[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" placeholder="" required>
                        <span id="countrycode">
                            (+63) </span>
                        <div id="phone-icon" class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" id="firstreset" class="btn btn-primary col-lg-12" value="Submit">
                        <p class="mb-0 mt-2">
                            <a href="index.php" class="text-center">Back to Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'scripts.php';
    // include 'register_script_function.php'; 
    ?>


<script> 

            $('#firstreset').click(function (e) { 
           e.preventDefault();
         
           var form = $(this).parents('form');
           Swal.fire({
                    title: "Confirm Password Reset?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "Blue",
                    confirmButtonText: "Confirm!",
                    closeOnConfirm: false
                }).then((result) => {
                        if (result.isConfirmed) {
                           form.submit();
                        }
                });    
       });



</script>
</body>

</html>