

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
     function delPost(id,status){
         let dlg = '';
         choicestats = '';
        if(status == 0){
          dlg = 'Archive Post?';
          choicestats = 1;
        }else{
            dlg = 'Retrieve Post?';
            choicestats = 0;
        }

        Swal.fire({
                    title: dlg,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "Blue",
                    confirmButtonText: "Confirm!",
                    closeOnConfirm: false
                }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "archive-post.php",
                                data: {
                                    id: id,
                                    stats: choicestats
                                },
                                success: function (response) {

                                    if(response == 1){
                                        Swal.fire({
                                        icon: 'success',
                                        text: 'Updated Successfully!',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // var session = 
                                            //                       if(session == 2){
                                            //                         $('#tbod').load('show_admin_table.php');
                                            //                       }else{
                                            //                         $('#tbod').load('show_user_table.php');
                                            //                       }
                                            $('#PostMsg').load('info_board_script.php');
                                        }
                                    });
                                    }else{
                                        Swal.fire({
                                        icon: 'error',
                                        text: 'Archive Failed!',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // var session = 
                                            //                       if(session == 2){
                                            //                         $('#tbod').load('show_admin_table.php');
                                            //                       }else{
                                            //                         $('#tbod').load('show_user_table.php');
                                            //                       }
                                            $('#PostMsg').load('info_board_script.php');
                                        }
                                    });
                                        
                                    }
                                    
                                }
                            });
                        
                        }
                });    
        

           
       }


    $(document).ready(function() {



       $('#submit_user').click(function (e) { 
           e.preventDefault();
         
           var form = $(this).parents('form');
           Swal.fire({
                    title: "Add Account?",
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
        
        $('#submitPost').click(function() {

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
            });



            Swal.fire({
                title: 'Create Post',
                html:
                    '<form method="post" action="" enctype="multipart/form-data"><div class="form-group overflow-hidden"><input id="idPost" class="d-none" value="<?php if (isset($_SESSION['USER_ID'])) {echo $_SESSION['USER_ID'];} ?>" name="id">' +
                    '<input id="datePost" class="d-none" value="<?php date_default_timezone_set('Asia/Manila');echo date('Y-m-d H:i:s');  ?>" name="date"><div class="user-post-text-wrap"><div class="user-txt-post p-0"><textarea class="form-control upostTextarea" id="postMsg" placeholder="What is on your mind" name="message"></textarea></div></div>' +
                    '<ul id="media-list" class="clearfix"><li class="myupload"><span><i class="fa fa-plus" aria-hidden="true"></i><input type="file" click-type="type1" id="picupload" class="picupload" name="files" multiple></span></li></ul></div></form>',


                focusConfirm: false,
                customClass: {
                    container: 'overflow-hidden',

                },
                showCancelButton: true,

                preConfirm: (value) => {

                    var id = document.getElementById('idPost').value;
                    var date = document.getElementById('datePost').value;
                    var msg = document.getElementById('postMsg').value;

                    var fd = new FormData();
                    //following  code is working fine in for single image upload
                    // var files = $('#file')[0].files[0]; 
                    // fd.append('file',files);

                    //this code not working for multiple image upload           
                    var names = [];
                    var file_data = $('input[type="file"]')[0].files;
                    // for multiple files
                    for (var i = 0; i < file_data.length; i++) {
                        fd.append("file_" + i, file_data[i]);
                    }
                    fd.append('file[]', names);
                    fd.append('message', msg);
                    fd.append('date', date);
                    fd.append('id', id);
                    if (id && date && msg) {
                        $.ajax({
                            url: "sendPost.php",
                            type: "post",
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function(result) {
                                if (result == 1) {
                                    Swal.fire({
                                        icon: 'success',
                                        text: 'Updated Successfully!',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // var session = 
                                            //                       if(session == 2){
                                            //                         $('#tbod').load('show_admin_table.php');
                                            //                       }else{
                                            //                         $('#tbod').load('show_user_table.php');
                                            //                       }
                                            $('#PostMsg').load('info_board_script.php');
                                        }
                                    });
                                } else if (result == 2) {
                                    Toast.fire({
                                        customClass: {
                                            icon: 'bg-red',
                                        },
                                        icon: 'warning',
                                        title: 'Error Images!',
                                    });
                                } else if (result == 3) {
                                    Toast.fire({
                                        customClass: {
                                            icon: 'bg-red',
                                        },
                                        icon: 'warning',
                                        title: 'Error Inserting!',
                                    });

                                } else {
                                    Toast.fire({
                                        customClass: {
                                            icon: 'bg-red',
                                        },
                                        icon: 'error',
                                        title: result,
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert(textStatus, errorThrown);
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
        var names = [];

        $('body').on('change', '.picupload', function(event) {

            var getAttr = $(this).attr('click-type');
            var files = event.target.files;
            var output = document.getElementById("media-list");
            var z = 0
            if (getAttr == 'type1') {
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    names.push($(this).get(0).files[i].name);
                    if (file.type.match('image')) {

                        var picReader = new FileReader();
                        picReader.fileName = file.name
                        picReader.addEventListener("load", function(event) {

                            var picFile = event.target;

                            var div = document.createElement("li");

                            div.innerHTML = "<img src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                            $("#media-list").prepend(div);

                        });
                    }
                    picReader.readAsDataURL(file);

                }

            }
        });


       
    });


  

    $(function(){
      
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });

    });
</script>

<?php include 'send_sms_scripts.php'; ?>