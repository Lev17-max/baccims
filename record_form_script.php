<script>
    $('#sidebar-form').click(function (e) { 
        let date = new Date();
        let val = date.getFullYear()+'-'+date.getMonth()+1+date.getMinutes()+'-'+date.getSeconds(); 
        $(".blot-num").val(val);

        
    });
    
    $('.con-suspect').multifield({
        section: '.suspect',
        btnAdd:'.add-suspect',
	    btnRemove:'.minus-suspect'

    });
    $('.con-victim').multifield({
        section: '.victim',
        btnAdd:'.add-victim',
	    btnRemove:'.minus-victim'

    });
    $(document).ready(function () {
        $('.con-suspect').on('click touchstart', '.add-suspect', function() {
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
       

        $('#suspect-switch, #suspect-switch-up').click(function(){
            if($(this).is(":checked")){
                $('.suspect').addClass('d-none');
                var now = new Date();

                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                $('.input-item-b-faname').val('N/A');
                 $('.input-item-b-fname').val('N/A');
                 $('.input-item-b-mname').val('N/A');
                 $('.input-item-b-qual').val('N/A');
                 $('.input-item-b-nname').val('N/A');
                 $('.input-item-b-cship').val('N/A');
                 $('.input-item-b-gender').val('1');
                 $('.input-item-b-cstats').val('N/A');
                 $('.input-item-b-bdate').val(today);
                 $('.input-item-b-age').val('11');
                 $('.input-item-b-place-bday').val('N/A');
                 $('.input-item-b-home-num').val('999-999-9999');
                 $('.input-item-b-mobile-num').val('0000000000');
                 $('.input-item-b-curr-addr').val('N/A');
                 $('.input-item-b-sit').val('N/A');
                 $('.input-item-b-brgy').val('N/A');
                 $('.input-item-b-city').val('N/A');
                 $('.input-item-b-prov').val('N/A');

                 $('.input-item-b-oth-addr').val('N/A');
                 $('.input-item-b-sit2').val('N/A');
                 $('.input-item-b-brgy2').val('N/A');
                 $('.input-item-b-city2').val('N/A');
                 $('.input-item-b-prov2').val('N/A');

                 $('.input-item-b-educ').val('N/A');
                 $('.input-item-b-occ').val('N/A');
                 $('.input-item-b-id-press').val('N/A');
                 $('.input-item-b-email').val('N/A@gmail.com');
              
            }
            else{
                $('.suspect').removeClass('d-none');
            }

        });

        $('#victim-switch,#victim-switch-up').click(function (e) { 
            if($(this).is(':checked')){
                $('.victim').addClass('d-none');
            }else{
                $('.victim').removeClass('d-none');
            }
            
        });
        $('.input-item-a-bdate').blur(function (e) { 
            if($('#victim-switch').is(":checked")){  
                    $('.input-item-c-bdate').val($('.input-item-a-bdate').val());
            }else{

            }
                });
        $('.input-item-a-gender').on('change', function () {
            if($('#victim-switch').is(":checked")){  
            $('.input-item-c-gender').val($('.input-item-a-gender').val());
            }else{

            }
        });
        $(".input-item-a").keyup(function (e) { 
            if($('#victim-switch,#victim-switch').is(":checked")){  


               
                 $('.input-item-c-faname').val($('.input-item-a-faname').val());
                 $('.input-item-c-fname').val($('.input-item-a-fname').val());
                 $('.input-item-c-mname').val($('.input-item-a-mname').val());
                 $('.input-item-c-qual').val($('.input-item-a-qual').val());
                 $('.input-item-c-nname').val($('.input-item-a-nname').val());
                 $('.input-item-c-cship').val($('.input-item-a-cship').val());
                 $('.input-item-c-cstats').val($('.input-item-a-cstats').val());
                 $('.input-item-c-age').val($('.input-item-a-age').val());
                 $('.input-item-c-place-bday').val($('.input-item-a-place-bday').val());
                 $('.input-item-c-home-num').val($('.input-item-a-home-num').val());
                 $('.input-item-c-mobile-num').val($('.input-item-a-mobile-num').val());
                 $('.input-item-c-curr-addr').val($('.input-item-a-curr-addr').val());
                 $('.input-item-c-sit').val($('.input-item-a-sit').val());
                 $('.input-item-c-brgy').val($('.input-item-a-brgy').val());
                 $('.input-item-c-city').val($('.input-item-a-city').val());
                 $('.input-item-c-prov').val($('.input-item-a-prov').val());

                 $('.input-item-c-oth-addr').val($('.input-item-a-oth-addr').val());
                 $('.input-item-c-sit2').val($('.input-item-a-sit2').val());
                 $('.input-item-c-brgy2').val($('.input-item-a-brgy2').val());
                 $('.input-item-c-city2').val($('.input-item-a-city2').val());
                 $('.input-item-c-prov2').val($('.input-item-a-prov2').val());

                 $('.input-item-c-educ').val($('.input-item-a-educ').val());
                 $('.input-item-c-occ').val($('.input-item-a-occ').val());
                 $('.input-item-c-id-press').val($('.input-item-a-id-press').val());
                 $('.input-item-c-email').val($('.input-item-a-email').val());
                 
            }
            if($('#victim-address-switch').is(':checked')){
             
                 $('.input-item-a-oth-addr').val($('.input-item-a-curr-addr').val());
                 $('.input-item-a-sit2').val($('.input-item-a-sit').val());
                 $('.input-item-a-brgy2').val($('.input-item-a-brgy').val());
                 $('.input-item-a-city2').val($('.input-item-a-city').val());
                 $('.input-item-a-prov2').val($('.input-item-a-prov').val());
              
            } 

        });
            
        $('.input-item-b').keyup(function (e) { 
            if($('#suspect-address-switch').is(':checked')){
             
             $('.input-item-b-oth-addr').val($('.input-item-b-curr-addr').val());
             $('.input-item-b-sit2').val($('.input-item-b-sit').val());
             $('.input-item-b-brgy2').val($('.input-item-b-brgy').val());
             $('.input-item-b-city2').val($('.input-item-b-city').val());
             $('.input-item-b-prov2').val($('.input-item-b-prov').val());
          
            } 
        });
        $('.input-item-c').keyup(function (e) { 
            if($('#2nd-victim-address-switch').is(':checked')){
             
             $('.input-item-c-oth-addr').val($('.input-item-c-curr-addr').val());
             $('.input-item-c-sit2').val($('.input-item-c-sit').val());
             $('.input-item-c-brgy2').val($('.input-item-c-brgy').val());
             $('.input-item-c-city2').val($('.input-item-c-city').val());
             $('.input-item-c-prov2').val($('.input-item-c-prov').val());
          
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


        $('.incident-place,#incident-place').on('change', function () {
            if( $(this).val() ==='-1' ){
            $('#addPlace').modal('show');

           
                
            }
        });

       

        $('#phase-input').focus(function(){
            $('#phase-input').val("");
        });
        $('#purok-input').focus(function(){
            $('#purok-input').val("");
        });
        $('#brgy-input').focus(function(){
            $('#brgy-input').val("");
        });
        
 

    });
        
        $('#phase-input').keyup(function (e) { 
            $('#ph-hidden').val('');
            
        });
        $('#brgy-input').keyup(function (e) { 
            $('#brgy-hidden').val('');
            
        });
        $('#purok-input').keyup(function (e) { 
            $('#prk-hidden').val('');
            
        });

        $('.item-purok').click(function(e) {
            $('#purok-input').val($(this).text());
            $('#prk-hidden').val($(this).val());
        });
     
        $('.item-phase').click(function(e) {
            $('#phase-input').val($(this).text());
            $('#ph-hidden').val($(this).val());

        });
        $('.item-brgy').click(function(e) {
            $('#brgy-input').val($(this).text());
            $('#brgy-hidden').val($(this).val());
        });
        // $('#incident-place').blur(function (e) { 
        //     $('#incident-place').val('0').change();
        //     alert("aaas");
            
        // });


    function uploadInc(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-holder-inc').attr('src', e.target.result);
                $('#image-holder-inc').removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>