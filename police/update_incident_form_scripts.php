<script>
        $(document).ready(function () {
    $('.con-suspect-update').multifield({
        section: '.suspect-update',
        btnAdd:'.add-suspect-update',
	    btnRemove:'.minus-suspect-update'

    });
    $('.con-victim-update').multifield({
        section: '.victim-update',
        btnAdd:'.add-victim-update',
	    btnRemove:'.minus-victim-update'

    });

        $('.con-suspect-update').on('click touchstart', '.add-suspect-update', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
        });
       Toast.fire({
           title: 'field added',
           icon: 'success'
       })
        
    });
    $('.con-victim-update').on('click touchstart', '.add-victim-update', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
        });
       Toast.fire({
           title: 'field added',
           icon: 'success'
       })
        
    });
       
    
        $('#suspect-switch-update').click(function(){
            if($(this).is(":checked")){
                $('.suspect-update').addClass('d-none');
                var now = new Date();

                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                $('.input-item-b-update-faname').val('N/A');
                 $('.input-item-b-update-fname').val('N/A');
                 $('.input-item-b-update-mname').val('N/A');
                 $('.input-item-b-update-qual').val('N/A');
                 $('.input-item-b-update-nname').val('N/A');
                 $('.input-item-b-update-cship').val('N/A');
                 $('.input-item-b-update-gender').val('0');
                 $('.input-item-b-update-cstats').val('N/A');
                 $('.input-item-b-update-bdate').val(today);
                 $('.input-item-b-update-age').val('0');
                 $('.input-item-b-update-place-bday').val('N/A');
                 $('.input-item-b-update-home-num').val('999-999-9999');
                 $('.input-item-b-update-mobile-num').val('0000000000');
                 $('.input-item-b-update-curr-addr').val('N/A');
                 $('.input-item-b-update-sit').val('N/A');
                 $('.input-item-b-update-brgy').val('N/A');
                 $('.input-item-b-update-city').val('N/A');
                 $('.input-item-b-update-prov').val('N/A');

                 $('.input-item-b-update-oth-addr').val('N/A');
                 $('.input-item-b-update-sit2').val('N/A');
                 $('.input-item-b-update-brgy2').val('N/A');
                 $('.input-item-b-update-city2').val('N/A');
                 $('.input-item-b-update-prov2').val('N/A');

                 $('.input-item-b-update-educ').val('N/A');
                 $('.input-item-b-update-occ').val('N/A');
                 $('.input-item-b-update-id-press').val('N/A');
                 $('.input-item-b-update-email').val('N/A@gmail.com');
              
            }
            else{
                $('.suspect-update').removeClass('d-none');
            }

        });

        $('#victim-switch-update').click(function (e) { 
            if($(this).is(':checked')){
                $('.victim-update').addClass('d-none');
            }else{
                $('.victim-update').removeClass('d-none');
            }
            
        });
        $('.input-item-a-update-bdate').blur(function (e) { 
            if($('#victim-switch-update').is(":checked")){  
                    $('.input-item-c-update-bdate').val($('.input-item-a-update-bdate').val());
            }else{

            }
                });
        $('.input-item-a-update-gender').on('change', function () {
            if($('#victim-switch-update').is(":checked")){  
            $('.input-item-c-update-gender').val($('.input-item-a-update-gender').val());
            }else{

            }
        });
        $(".input-item-a-update").keyup(function (e) { 
            if($('#victim-switch-update,#victim-switch-update').is(":checked")){  
               
                 $('.input-item-c-update-faname').val($('.input-item-a-update-faname').val());
                 $('.input-item-c-update-fname').val($('.input-item-a-update-fname').val());
                 $('.input-item-c-update-mname').val($('.input-item-a-update-mname').val());
                 $('.input-item-c-update-qual').val($('.input-item-a-update-qual').val());
                 $('.input-item-c-update-nname').val($('.input-item-a-update-nname').val());
                 $('.input-item-c-update-cship').val($('.input-item-a-update-cship').val());
                 $('.input-item-c-update-cstats').val($('.input-item-a-update-cstats').val());
                 $('.input-item-c-update-age').val($('.input-item-a-update-age').val());
                 $('.input-item-c-update-place-bday').val($('.input-item-a-update-place-bday').val());
                 $('.input-item-c-update-home-num').val($('.input-item-a-update-home-num').val());
                 $('.input-item-c-update-mobile-num').val($('.input-item-a-update-mobile-num').val());
                 $('.input-item-c-update-curr-addr').val($('.input-item-a-update-curr-addr').val());
                 $('.input-item-c-update-sit').val($('.input-item-a-update-sit').val());
                 $('.input-item-c-update-brgy').val($('.input-item-a-update-brgy').val());
                 $('.input-item-c-update-city').val($('.input-item-a-update-city').val());
                 $('.input-item-c-update-prov').val($('.input-item-a-update-prov').val());

                 $('.input-item-c-update-oth-addr').val($('.input-item-a-update-oth-addr').val());
                 $('.input-item-c-update-sit2').val($('.input-item-a-update-sit2').val());
                 $('.input-item-c-update-brgy2').val($('.input-item-a-update-brgy2').val());
                 $('.input-item-c-update-city2').val($('.input-item-a-update-city2').val());
                 $('.input-item-c-update-prov2').val($('.input-item-a-update-prov2').val());

                 $('.input-item-c-update-educ').val($('.input-item-a-update-educ').val());
                 $('.input-item-c-update-occ').val($('.input-item-a-update-occ').val());
                 $('.input-item-c-update-id-press').val($('.input-item-a-update-id-press').val());
                 $('.input-item-c-update-email').val($('.input-item-a-update-email').val());
                 
            }
            if($('#victim-address-switch').is(':checked')){
             
                 $('.input-item-a-update-oth-addr').val($('.input-item-a-update-curr-addr').val());
                 $('.input-item-a-update-sit2').val($('.input-item-a-update-sit').val());
                 $('.input-item-a-update-brgy2').val($('.input-item-a-update-brgy').val());
                 $('.input-item-a-update-city2').val($('.input-item-a-update-city').val());
                 $('.input-item-a-update-prov2').val($('.input-item-a-update-prov').val());
              
            } 

        });
            
        $('.input-item-b-update').keyup(function (e) { 
            if($('#suspect-address-switch').is(':checked')){
             
             $('.input-item-b-update-oth-addr').val($('.input-item-b-update-curr-addr').val());
             $('.input-item-b-update-sit2').val($('.input-item-b-update-sit').val());
             $('.input-item-b-update-brgy2').val($('.input-item-b-update-brgy').val());
             $('.input-item-b-update-city2').val($('.input-item-b-update-city').val());
             $('.input-item-b-update-prov2').val($('.input-item-b-update-prov').val());
          
            } 
        });
        $('.input-item-c-update').keyup(function (e) { 
            if($('#2nd-victim-address-switch').is(':checked')){
             
             $('.input-item-c-update-oth-addr').val($('.input-item-c-update-curr-addr').val());
             $('.input-item-c-update-sit2').val($('.input-item-c-update-sit').val());
             $('.input-item-c-update-brgy2').val($('.input-item-c-update-brgy').val());
             $('.input-item-c-update-city2').val($('.input-item-c-update-city').val());
             $('.input-item-c-update-prov2').val($('.input-item-c-update-prov').val());
          
        }
        });
      
     
      //this is for the incident type scripts
    
   
    //   $('#id-show').removeClass('d-none');


        $('.incident-type').change(function (e) { 
            if( $(this).val() ==='504' ){
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
            });
             Swal.fire({
                title: 'Add Incident Type',
                html:
                    '<form method="post" action="" enctype="multipart/form-data"><div class="form-group overflow-hidden">' +
                    '<div class="user-post-text-wrap"><div class="user-txt-post p-0"><input id="inc-name" class="form-control" name="subject" placeholder="Incident Name:"></div></div>' +
                    '<label for="input-inc"> Select Icon </label><input type="file" accept=".png" placeholder="Choose Icon" name="inc-icon" class="form-control hidden" id="input-inc" onChange="uploadInc(this)" required>'+
                    '<center><div class="card m-0 p-0 row"><div class="card-body w-25 col align-self-center"><img id="image-holder-inc" width="50px" height="50px"class="info-box d-none">  </center>'+
                    '</div></div></div></form>',
                focusConfirm: false,
                customClass: {
                    container: 'overflow-hidden',

                },
                showCancelButton: true,
                preConfirm: (value) => {
                    var name = document.getElementById('inc-name').value;
                    var fd = new FormData();
                    var files = $('#input-inc')[0].files[0]; 
                    fd.append('file',files);
                    fd.append('name', name);
                    if (name) {
                        $.ajax({
                            url: "add_incident.php",
                            type: "post",
                            data: fd,
                            contentType: false,
                            processData: false,
                            cache: false,
                            success: function(result) {

                                if (result == 1) {
                                    Swal.fire({
                                        icon: 'success',
                                        text: 'Updated Successfully!',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                          $('.incident-type').load("display_incident.php");
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
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.cancel) {
                    $('.incident-type').val('0').change();
                } else {
                    $('.incident-type').val('0').change();
                }
                });
            }
            
        });


        $('#incident-place-update').on('change', function () {
            if( $(this).val() ==='-1' ){
            $('#addPlace').modal('show');

           
                
            }
        });



























































































       
        
 

    });
        

        $('#submit-form-update').click(function (e) { 
           e.preventDefault();
         
           var form = $(this).parents('form');
           Swal.fire({
                    title: "Submit Form?",
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "Blue",
                    confirmButtonText: "Confirm!",
                    closeOnConfirm: false
                }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "log-incident-status.php",
                                data: {
                                    blotnum : $('#blot-num-up').val(),
                                    date : "<?php date_default_timezone_set('Asia/Manila');echo date('Y-m-d H:i:s');  ?>",
                                    status: 3,
                                    user:  <?php echo $_SESSION['USER_ID']; ?>
                                },
                                success: function (ans) {
                                    if(ans == 204){
                                    form.submit();
                                    }else{
                                    
                                    }
            
                                    
                                }
                                     });
                     
                        }
                });    
       });

 
    
</script>