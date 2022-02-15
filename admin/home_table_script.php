<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
    });


    $(document).ready(function() {



    });
    //     $('#tbod').on('click touchstart', '.options', function() {


    // });

    function submitID(btndata) {

        $.ajax({
            type: "POST",
            url: "options_user.php",
            data: {
                id: btndata,
            },
            cache: false,
            success: function(response) {
                var data = response.split('|');
                var res_id = data[0];
                var accs = data[1];
                var stats = data[2];
                var verified = data[3];
                var name = data[4];
                var html_stats = '';
                var html_choice = '';
                var html_choice_frag = '';
                var choices = 0;


                if (stats == 0) {
                    choices = 1;
                    html_stats = '      <a class="btn btn-app bg-danger archive"> ' +
                        '          <i class="fas fa-trash"></i>        ' +
                        '          Archive                             ' +
                        '      </a>                                    ';
                } else {
                    choices = 0;
                    html_stats = '      <a class="btn btn-app bg-success archive"> ' +
                        '          <i class="fas fa-check"></i>        ' +
                        '          Activate                            ' +
                        '      </a>                                    ';
                }
                if (verified == 0 || verified == 3) {
                    html_choice_frag = ' <a class="btn btn-app bg-success approve"> ' +
                        '          <i class="fas fa-check-double"></i>        ' +
                        '         Approve                             ' +
                        '      </a>                                    ' +
                        '     <a class="btn btn-app bg-warning request"> ' +
                        '          <i class="fas fa-info"></i>        ' +
                        '          Request                     ' +
                        '      </a>                                  ';

                } else if (verified == 2) {
                    html_choice_frag = '';


                } else {
                    html_choice_frag = '<a class="btn btn-app bg-danger request"> ' +
                        '          <i class="fas fa-info"></i>        ' +
                        '          Request                             ' +
                        '        </a>                                    ';
                }



                // html_choice = '<div class="btn-group">'+
                //                 html_choice_frag       +
                //               '</div>';


                // html_choice ='  <div class="dropdown-menu" role="menu">                    '+
                //              '    <a class="dropdown-item" href="#">Action</a>             '+
                //              '    <a class="dropdown-item" href="#">Another action</a>     '+
                //              '    <a class="dropdown-item" href="#">Something else here</a>'+
                //              '  </div>                                                     ';                                               

                var htmlformat = '<div class="card btn-group">                           ' +
                    '  <div class="card-body">                    ' +
                    '      <a class="btn btn-app bg-info edit">       ' +
                    '          <i class="fas fa-pen"></i>        ' +
                    '          Edit                               ' +
                    '      </a>                                    ' +
                    html_stats + <?php if ($_SESSION['ACCESS_LEVEL'] != 1 && $_SESSION['ACCESS_LEVEL'] != 3) {
                                        echo 'html_choice_frag +';
                                    } else {
                                        echo '';
                                    } ?> '  </div>                                     ' +
                    '<div>                                        ';


                Swal.fire({
                    title: 'OPTIONS',
                    html: htmlformat,

                    focusConfirm: false,
                    showConfirmButton: false,
                    customClass: {
                        container: 'overflow-hidden',

                    },
                    showCancelButton: true,
                });



                $('.archive').click(function() {


                    Swal.fire({
                        title: "Continue ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: "Blue",
                        confirmButtonText: "Confirm!",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "archive.php",
                                type: "post",
                                data: {
                                    id: btndata,
                                    status: stats,
                                },
                                cache: false,
                                success: function(response) {

                                    if (response == 1) {

                                        $.ajax({
                                            type: "POST",
                                            url: "log-user-status.php",
                                            data: {
                                                userid: btndata,
                                                date: "<?php date_default_timezone_set('Asia/Manila');echo date('Y-m-d H:i:s');  ?>" ,
                                                status : choices,
                                                editorid: <?php echo $_SESSION['USER_ID']; ?>
                                            },
                                            success: function (ans) {
                                                if(ans == 204){
                                                    Swal.fire({
                                                        icon: 'success',
                                                        text: 'Updated Successfully!',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var session = '<?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                            } ?>';
                                                            if (session == 1) {
                                                                $('#tbod').load('show_police_table.php', {
                                                                    id: <?php if (isset($_SESSION['USER_ID'])) {
                                                                            echo $_SESSION['USER_ID'];
                                                                        } ?>,
                                                                    accs: <?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                            } ?>
                                                                });
                                                            } else {
                                                                $('#tbod').load('show_admin_table.php', {
                                                                    id: <?php if (isset($_SESSION['USER_ID'])) {
                                                                            echo $_SESSION['USER_ID'];
                                                                        } ?>,
                                                                    accs: <?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                            } ?>
                                                                });
                                                            }

                                                        }
                                                    });

                                                }
                                                
                                            }
                                        });

                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            text: 'Update Failed!',
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    alert(textStatus, errorThrown);
                                }
                            });
                        }

                    });


                });




                $('.edit').click(function() {

                    var selection;
                    if (accs == 1) {
                        selection = '<div class="input-group mb-3"><select id="type" class="custom-select rounded-0" id="exampleSelectRounded0" required><option value="0" selected>Resident User</option><option value="1" selected>Police</option><option value="2">Barangay Official</option></select><div class="input-group-append"><div class="input-group-text"><span class="fas fa-exclamation-circle"></span></div></div></div>';
                    } else if (accs == 2) {
                        selection = '<div class="input-group mb-3"><select id="type" class="custom-select rounded-0" id="exampleSelectRounded0" required><option value="0" >Resident User</option><option value="1">Police</option><option value="2" selected>Barangay Official</option></select><div class="input-group-append"><div class="input-group-text"><span class="fas fa-exclamation-circle"></span></div></div></div>';
                    } else {
                        selection = '<div class="input-group mb-3"><select id="type" class="custom-select rounded-0" id="exampleSelectRounded0" required><option value="0" selected>Resident User</option><option value="1">Police</option><option value="2">Barangay Official</option></select><div class="input-group-append"><div class="input-group-text"><span class="fas fa-exclamation-circle"></span></div></div></div>';
                    }


                    Swal.fire({
                        title: 'EDIT ' + name,
                        html: selection,
                        focusConfirm: false,
                        customClass: {
                            container: 'overflow-hidden',

                        },
                        showCancelButton: true,

                        preConfirm: (value) => {
                            var access = document.getElementById('type').value;
                            if (access) {

                                Swal.fire({
                                    title: "Change Account Type?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: "Blue",
                                    confirmButtonText: "Confirm!",
                                    closeOnConfirm: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "update_user.php",
                                            type: "post",
                                            data: {
                                                id: btndata,
                                                access_level: access
                                            },
                                            cache: false,
                                            success: function(response) {
                                            
                                                if (response == 1) {


                                                    $.ajax({
                                                            type: "POST",
                                                            url: "log-user-status.php",
                                                            data: {
                                                                userid: btndata,
                                                                date: "<?php date_default_timezone_set('Asia/Manila');echo date('Y-m-d H:i:s');  ?>" ,
                                                                status : 2,
                                                                editorid: <?php echo $_SESSION['USER_ID']; ?>
                                                            },
                                                            success: function (ans) {
                                                                if(ans == 204){

                                                                    Swal.fire({
                                                                        icon: 'success',
                                                                        text: 'Updated Successfully!',
                                                                    }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            var session = '<?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                                            } ?>';
                                                                            if (session == 1) {
                                                                                $('#tbod').load('show_police_table.php', {
                                                                                    id: <?php if (isset($_SESSION['USER_ID'])) {
                                                                                            echo $_SESSION['USER_ID'];
                                                                                        } ?>,
                                                                                    accs: <?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                                            } ?>
                                                                                });
                                                                            } else {
                                                                                $('#tbod').load('show_admin_table.php', {
                                                                                    id: <?php if (isset($_SESSION['USER_ID'])) {
                                                                                            echo $_SESSION['USER_ID'];
                                                                                        } ?>,
                                                                                    accs: <?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                                            } ?>
                                                                                });
                                                                            }
                                                                        }
                                                                    });


                                                                }
                                                            }
                                                        });




                                                
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        text: 'Update Failed!',
                                                    });

                                                }
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                                alert(textStatus, errorThrown);
                                            }
                                        });
                                    }
                                });

                            } else {
                                Swal.showValidationMessage(
                                    'input data on all fields'
                                )
                            }
                        },
                    });

                });



                $('.approve').click(function(e) {



                    Swal.fire({
                        title: "Approve Account?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: "Blue",
                        confirmButtonText: "Confirm!",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "approve.php",
                                type: "post",
                                data: {
                                    id: btndata,
                                    ver: 1,
                                },
                                cache: false,
                                success: function(response) {

                                    if (response == 1) {


                                        $.ajax({
                                                            type: "POST",
                                                            url: "log-user-status.php",
                                                            data: {
                                                                userid: btndata,
                                                                date: "<?php date_default_timezone_set('Asia/Manila');echo date('Y-m-d H:i:s');  ?>" ,
                                                                status : 3,
                                                                editorid: <?php echo $_SESSION['USER_ID']; ?>
                                                            },
                                                            success: function (ans) {
                                                                if(ans == 204){

                                                                    Swal.fire({
                                                                                icon: 'success',
                                                                                text: 'Updated Successfully!',
                                                                            }).then((result) => {
                                                                                if (result.isConfirmed) {
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url: "send-sms-via-api.php",
                                                                                        data: {
                                                                                            msg : "Your Registration is approved. You can now login in baccims.co",
                                                                                            id : btndata,

                                                                                        },
                                                                                        success: function (response) {
                                                                                            
                                                                                        }
                                                                                    });
                                                                                    var session = '<?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                                        echo $_SESSION['ACCESS_LEVEL'];
                                                                                                    } ?>';

                                                                                    if (session == 1) {
                                                                                        $('#tbod').load('show_police_table.php', {
                                                                                            id: <?php if (isset($_SESSION['USER_ID'])) {
                                                                                                    echo $_SESSION['USER_ID'];
                                                                                                } ?>
                                                                                        });

                                                                                    } else {
                                                                                        $('#tbod').load('show_admin_table.php', {
                                                                                            id: <?php if (isset($_SESSION['USER_ID'])) {
                                                                                                    echo $_SESSION['USER_ID'];
                                                                                                } ?>,
                                                                                            accs: <?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                                        echo $_SESSION['ACCESS_LEVEL'];
                                                                                                    } ?>
                                                                                        });
                                                                                    }

                                                                                }
                                                                            });


                                                                }
                                                            }
                                                        });
                                      
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            text: 'Update Failed!',
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    alert(textStatus, errorThrown);
                                }
                            });
                        }
                    });





                });
                $('.request').click(function(e) {


                    Swal.fire({
                        title: "Request Another ID?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: "Blue",
                        confirmButtonText: "Confirm!",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                url: "approve.php",
                                type: "post",
                                data: {
                                    id: btndata,
                                    ver: 2,
                                },
                                cache: false,
                                success: function(response) {
                                    if (response == 1) {

                                        $.ajax({
                                            type: "POST",
                                            url: "log-user-status.php",
                                            data: {
                                                userid: btndata,
                                                date: "<?php date_default_timezone_set('Asia/Manila');echo date('Y-m-d H:i:s');  ?>" ,
                                                status : 4,
                                                editorid: <?php echo $_SESSION['USER_ID']; ?>
                                            },
                                            success: function (ans) {
                                                if(ans == 204){
                                                    Swal.fire({
                                                        icon: 'success',
                                                        text: 'Updated Successfully!',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {

                                                            $.ajax({
                                                                type: "POST",
                                                                url: "send-sms-via-api.php",
                                                                data: {
                                                                    msg : "Your Registration is Declined. Please Resubmit Clear ID in baccims.co",
                                                                    id : btndata,

                                                                },
                                                                success: function (response) {
                                                                    
                                                                }
                                                            });


                                                            var session = '<?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                            } ?>';
                                                            if (session == 1) {
                                                                $('#tbod').load('show_police_table.php', {
                                                                    id: <?php if (isset($_SESSION['USER_ID'])) {
                                                                            echo $_SESSION['USER_ID'];
                                                                        } ?>,
                                                                    accs: <?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                            } ?>
                                                                });
                                                            } else {
                                                                $('#tbod').load('show_admin_table.php', {
                                                                    id: <?php if (isset($_SESSION['USER_ID'])) {
                                                                            echo $_SESSION['USER_ID'];
                                                                        } ?>,
                                                                    accs: <?php if (isset($_SESSION['ACCESS_LEVEL'])) {
                                                                                echo $_SESSION['ACCESS_LEVEL'];
                                                                            } ?>
                                                                });
                                                            }

                                                        }
                                                    });
                                                }
                                            }
                                        });
                                      
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            text: 'Update Failed!',
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    alert(textStatus, errorThrown);
                                }
                            });
                        }
                    });



                });
                //add code here
            }

        });
        //end of ajax




    };
</script>