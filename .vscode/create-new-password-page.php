<!DOCTYPE html>
<html lang="en">
<?php 
?>
<head>
    <?php include 'session_file.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php include 'head.php'; ?>
    <title>BACCIMS Update Password</title>
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
                <form method="POST" action="server-create-password.php">
                    <input type="hidden" class="d-none" value="<?php echo $id; ?>"name="hidden-id">
                    <label> Current Password:</label><br>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" onkeypress="capLock(event)" id="currpass" name="old-pass" placeholder="Current Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <label>New Password:</label><br>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" onkeypress="capLock(event)" id="newpass" name="new-pass" placeholder="New Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <label>Re-Enter New Password:</label><br>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" onkeypress="capLock(event)"id="pass" name="pass" placeholder="Re-Enter New Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="capslock-on d-none"><span class="d-flex justify-content-center"><i class="fas fa-exclamation-triangle mt-1 text-yellow"></i>&nbsp Capslock is On</span></div>


                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" id="resetpass" class="btn btn-primary col-lg-12" value="Submit">
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
      <script src="dist/js/login.js"></script>

    <script>
        $(document).ready(function(e) {
            $('#currpass').blur(function(e) {
                $.ajax({
                    type: "POST",
                    url: "server-search-password.php",
                    data: {
                        id: <?php echo $id; ?>,
                        currpass: $(this).val(),
                    },
                    success: function(response) {
                        if(response != 1){
                            $('#currpass').addClass('is-invalid');
                            $('#currpass').removeClass('is-valid');
                            $('#resetpass').prop('disabled', true);
                        }else{
                            $('#currpass').removeClass('is-invalid');
                            $('#currpass').addClass('is-valid');
                            $('#resetpass').prop('disabled', false);
                        }

                    }
                });
            });

            $('#newpass').keyup(function (e) { 

                   if($(this).val() == $('#pass').val() && $(this).val() != ''){
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                    $('#pass').removeClass('is-invalid');
                    $('#pass').addClass('is-valid');
                    $('#resetpass').prop('disabled', true);
                  }else{
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                    $('#pass').removeClass('is-valid');
                    $('#pass').addClass('is-invalid');
                    $('#resetpass').prop('disabled', false);

                  }
                
            });
            $('#pass').keyup(function (e) { 

                if($(this).val() == $('#newpass').val() && $(this).val() != ''){
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                    $('#newpass').removeClass('is-invalid');
                    $('#newpass').addClass('is-valid');
                    $('#resetpass').prop('disabled', false);
                  }else{
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                    $('#newpass').removeClass('is-valid');
                    $('#newpass').addClass('is-invalid');
                    $('#resetpass').prop('disabled', true);
               

                  }
                
            });


            $('#resetpass').click(function (e) { 
           e.preventDefault();
         
           var form = $(this).parents('form');
           Swal.fire({
                    title: "Confirm Password?",
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




        })
    </script>

</body>

</html>